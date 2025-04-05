<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Trả về view trang admin
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
