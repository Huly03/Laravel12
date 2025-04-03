<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    // Hiển thị form tải ảnh lên
    public function showForm()
    {
        return view('upload');
    }

    // Nhận ảnh từ form, gửi tới Flask API và nhận kết quả nhận diện phong cách kiến trúc
    public function uploadImage(Request $request)
    {
        // Kiểm tra xem có ảnh được tải lên hay không
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image uploaded'], 400);
        }
    
        // Gửi ảnh tới Flask API
        $imagePath = $request->file('image')->store('uploads', 'public'); // Lưu ảnh vào thư mục 'public/uploads'
    
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
