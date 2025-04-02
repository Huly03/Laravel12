<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // Hiển thị form tải ảnh lên
    public function showForm()
    {
        return view('upload');
    }

    // Nhận ảnh từ form, gửi tới Flask API và nhận kết quả
    public function uploadImage(Request $request)
    {
        // Kiểm tra xem có ảnh được tải lên hay không
        if (!$request->hasFile('image')) {
            return redirect('/upload')->with('error', 'No image uploaded. Please try again.');
        }

        // Gửi ảnh tới Flask API
        $response = Http::attach(
            'image', file_get_contents($request->file('image')->getRealPath()), 'image.jpg'
        )->post('http://127.0.0.1:5000/api/detect'); // Gửi ảnh đến Flask API

        // Kiểm tra kết quả nhận được từ Flask
        if ($response->failed()) {
            return redirect('/upload')->with('error', 'Failed to get result from Flask. Please try again.');
        }

        // Lấy kết quả từ API Flask
        $result = $response->json();

        // Kiểm tra dữ liệu nhận được từ Flask API
        if (!isset($result['top_5_labels']) || count($result['top_5_labels']) == 0) {
            return redirect('/upload')->with('error', 'No result available. Please try again.');
        }

        // Trả kết quả về view 'result.blade.php' để hiển thị
        return view('result', ['result' => $result]);
    }
}
