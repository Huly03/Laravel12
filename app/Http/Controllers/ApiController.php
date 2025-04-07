<?php

namespace App\Http\Controllers;

use App\Models\ApiCall;  // Import đúng model ApiCall
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
        // Kiểm tra xem có ảnh được tải lên hay không
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image uploaded'], 400);
        }

        // Lưu ảnh vào thư mục public/uploads
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        // Gửi ảnh tới Flask API
        $response = Http::attach(
            'image', file_get_contents($request->file('image')->getRealPath()), 'image.jpg'
        )->post('http://127.0.0.1:5000/api/detect'); // Gửi ảnh tới Flask API
        
        // Kiểm tra nếu Flask API không trả về kết quả
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to get result from Flask'], 500);
        }

        // Lấy kết quả dự đoán từ Flask API
        $result = $response->json();

        // Kiểm tra dữ liệu trả về từ Flask
        if (!isset($result['top_5_labels']) || count($result['top_5_labels']) == 0) {
            return response()->json(['error' => 'No result from Flask'], 400);
        }

        // Lấy user_id từ session (hoặc header nếu muốn lấy từ header)
        $user_id = session('user_id');  // Lấy user_id từ session

        if (!$user_id) {
            // Nếu không có user_id trong session, có thể trả về lỗi hoặc để null
            return response()->json(['error' => 'User not logged in'], 400);
        }

        // Lưu log API vào bảng `api_calls` sau khi thực hiện xong
        ApiCall::create([
            'api_name' => 'predict_style',  // Tên API
            'user_id' => $user_id,          // Lưu user_id từ session
            'ip_address' => $request->ip(), // Lấy địa chỉ IP của người gọi API
            'timestamp' => now(),           // Lưu thời gian API được gọi
        ]);
        
        // Trả về imagePath và kết quả để hiển thị trong AJAX
        return response()->json([
            'imagePath' => $imagePath,  // Đường dẫn hình ảnh
            'result' => $result,        // Kết quả dự đoán
        ]);
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
