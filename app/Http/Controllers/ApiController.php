<?php

namespace App\Http\Controllers;

use App\Models\ApiCall;  // Import đúng model ApiCall
use App\Models\ArchitectureStyle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    // Hiển thị form tải ảnh lên
    public function showForm()
    {
        
        return view('upload');
    }


    public function uploadImage(Request $request)
{
    if (!$request->hasFile('image')) {
        return response()->json(['error' => 'No image uploaded'], 400);
    }

    $imageFile = $request->file('image');
    $imagePath = $imageFile->store('uploads', 'public');

    try {
        $response = Http::attach(
            'image',
            file_get_contents($imageFile->getRealPath()),
            'image.jpg'
        )->post('http://127.0.0.1:5000/api/detect');

        if ($response->failed()) {
            return response()->json(['error' => 'Flask API error'], 500);
        }

        $result = $response->json();

        if (
            !isset($result['top_5_labels']) ||
            !isset($result['top_5_probs']) ||
            count($result['top_5_labels']) === 0
        ) {
            return response()->json(['error' => 'Invalid result from Flask'], 400);
        }

        // Lấy user_id
        $user_id = session('user_id') ?? Auth::id();

        if (!$user_id) {
            return response()->json(['error' => 'User not authenticated'], 403);
        }

        // Lưu log
        ApiCall::create([
            'api_name' => 'predict_style',
            'user_id' => $user_id,
            'ip_address' => $request->ip(),
            'timestamp' => now(),
        ]);

        ArchitectureStyle::create([
            'image' => $imagePath,
            'style' => $result['top_5_labels'][0],  // Lưu kết quả phong cách cao nhất
            'detection_time' => now(),
            'id_user' => $user_id,
        ]);

        // Gửi kết quả phong cách kiến trúc cao nhất vào chatbot API để tự động trả lời
        $topStyle = $result['top_5_labels'][0];  // Phong cách cao nhất
        $chatbotResponse = Http::post('http://127.0.0.1:5000/api/chatbot', [
            'user_input' => "Thông tin về phong cách kiến trúc " . $topStyle
        ]);

        if ($chatbotResponse->failed()) {
            return response()->json(['error' => 'Chatbot API error'], 500);
        }

        $chatbotData = $chatbotResponse->json();

        // Gửi lại JSON về frontend
        return response()->json([
            'imagePath' => $imagePath,
            'result' => $result,
            'chatbotResponse' => $chatbotData['response'] ?? 'No response from chatbot',
        ]);

    } catch (\Exception $e) {
        \Log::error('Upload error: ' . $e->getMessage());
        return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
    }
}


    
    
        // Nhận câu hỏi từ form và gọi API chatbot
    public function chatWithBot(Request $request)
    {
        if (!$request->has('user_input')) {
            return response()->json(['error' => 'No input provided'], 400);
        }
    
        $response = Http::post('http://127.0.0.1:5000/api/chatbot', [
            'user_input' => $request->input('user_input'),
            'language' => 'vi'
        ]);
    
        if ($response->failed()) {
            return response()->json(['error' => 'Chatbot failed'], 500);
        }
    
        return response()->json($response->json());
    }

    // Phương thức gọi API tìm kiếm với từ khóa
    public function searchQuery(Request $request)
    {
        $searchQuery = $request->input('query');
        \Log::info("Search query sent to Flask: " . $searchQuery);  // Log dữ liệu
    
        $response = Http::post('http://127.0.0.1:5000/search', [
            'query' => $searchQuery
        ]);
    
        if ($response->failed()) {
            \Log::error("Error calling Flask API: " . $response->body());  // Log lỗi nếu có
            return response()->json(['error' => 'Error while calling Flask API'], 500);
        }
    
        // Log phản hồi từ Flask
        \Log::info("Response from Flask: " . json_encode($response->json()));
    
        // Trả về kết quả cho frontend
        return response()->json($response->json());
    }
    
    
}