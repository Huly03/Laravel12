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
            \Log::error('No image uploaded'); // Log khi ảnh không được tải lên
            return response()->json(['error' => 'No image uploaded'], 400);
        }

        $imageFile = $request->file('image');

        // Kiểm tra ảnh có hợp lệ không
        if (!$imageFile->isValid()) {
            \Log::error('Uploaded image is not valid');
            return response()->json(['error' => 'Uploaded image is not valid'], 400);
        }

        $imagePath = $imageFile->store('uploads', 'public');

        try {
            // Gửi ảnh tới Flask
            \Log::info('Sending image to Flask for detection...');

            $response = Http::attach(
                'image',
                file_get_contents($imageFile->getRealPath()), // Đọc ảnh từ file
                $imageFile->getClientOriginalName() // Đảm bảo tên file đúng
            )->post('http://127.0.0.1:5000/api/detect');  // Flask API endpoint

            // Log response từ Flask
            \Log::info('Flask response body: ' . $response->body());  // Log body của response

            if ($response->failed()) {
                \Log::error('Failed to get result from Flask: ' . $response->body()); // Log khi Flask không trả về đúng
                return response()->json(['error' => 'Failed to get result from Flask'], 500);
            }

            $result = $response->json();
            \Log::info('Flask result: ' . json_encode($result));

            // Kiểm tra kết quả trả về từ Flask
            if (
                !isset($result['top_5_labels']) ||
                !isset($result['top_5_probs']) ||
                count($result['top_5_labels']) == 0
            ) {
                \Log::error('Invalid result from Flask');
                return response()->json(['error' => 'Invalid result from Flask'], 400);
            }

            // Lưu kết quả vào database
            ApiCall::create([
                'api_name' => 'predict_style',
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'timestamp' => now(),
            ]);

            ArchitectureStyle::create([
                'image' => $imagePath,
                'style' => $result['top_5_labels'][0],  // Phong cách nhận diện
                'detection_time' => now(),
                'id_user' => Auth::id(),
            ]);

            // Trả kết quả cho frontend
            return response()->json([
                'imagePath' => $imagePath,
                'result' => $result,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error during image upload: ' . $e->getMessage());
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