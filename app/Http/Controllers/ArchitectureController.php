<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;  // Đảm bảo bạn có mô hình Architecture
use Illuminate\Support\Facades\Storage;

class ArchitectureController extends Controller
{
    // Hiển thị form tạo mới
    public function create()
    {
        return view('architecture');
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
    public function show($id)
    {
        // Tìm phong cách kiến trúc theo ID
        $architecture = Architecture::findOrFail($id);
    
        // Đảm bảo đường dẫn tệp là chính xác
        $textFilePath = $architecture->text_file; // text_files/Bb26PKnhO0uJNVhxiPbiJVKINuDJlXXTtFOk9SeO.txt
    
        // Kiểm tra xem tệp có tồn tại không
        if (!Storage::disk('public')->exists($textFilePath)) {
            dd('Tệp không tồn tại: ' . $textFilePath);
        }
    
        // Đọc nội dung tệp .txt từ disk 'public'
        try {
            $textContent = Storage::disk('public')->get($textFilePath); // Đảm bảo chỉ sử dụng 'text_files/...'
        } catch (\Exception $e) {
            dd($e->getMessage());  // Nếu có lỗi, hiển thị thông báo lỗi
        }
    
        // Trả về view chi tiết phong cách kiến trúc
        return view('architecture.show', compact('architecture', 'textContent'));
    }
    
    
    
    
    
}
