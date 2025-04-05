<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;  // Đảm bảo bạn có mô hình Architecture
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Lấy tất cả các phong cách kiến trúc từ bảng architectures
        $architectures = Architecture::all();  // Lấy tất cả bản ghi

        // Trả về view dashboard của admin và truyền dữ liệu phong cách kiến trúc
        return view('admin.dashboard', compact('architectures'));
    }
    // Xử lý lưu dữ liệu vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image_url' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',  // Kiểm tra ảnh
            'description' => 'required|string',
            'text_file' => 'required|mimes:txt|max:2048',  // Kiểm tra tệp .txt
        ]);

        // Lưu ảnh
        $imagePath = $request->file('image_url')->store('images', 'public');  // Lưu ảnh vào thư mục public/images

        // Lưu tệp txt
        $textFilePath = $request->file('text_file')->store('text_files', 'public');  // Lưu tệp vào thư mục public/text_files

        // Lưu dữ liệu vào cơ sở dữ liệu
        $architecture = new Architecture();
        $architecture->name = $request->input('name');
        $architecture->image_url = $imagePath;
        $architecture->description = $request->input('description');
        $architecture->text_file = $textFilePath;
        $architecture->save();

        return redirect()->route('architecture')->with('success', 'Phong cách kiến trúc đã được thêm thành công!');
    }

}
