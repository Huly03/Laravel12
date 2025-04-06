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
    // Hiển thị form chỉnh sửa phong cách kiến trúc
    public function edit($id)
    {
        $architecture = Architecture::findOrFail($id);
        return view('architecture.edit', compact('architecture'));
    }

    // Xử lý cập nhật phong cách kiến trúc
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'description' => 'required|string',
            'text_file' => 'nullable|mimes:txt|max:2048',
        ]);

        $architecture = Architecture::findOrFail($id);
        $architecture->name = $request->input('name');
        $architecture->description = $request->input('description');

        // Nếu có ảnh mới thì lưu ảnh và xóa ảnh cũ
        if ($request->hasFile('image_url')) {
            Storage::disk('public')->delete($architecture->image_url);  // Xóa ảnh cũ
            $imagePath = $request->file('image_url')->store('images', 'public');
            $architecture->image_url = $imagePath;
        }

        // Nếu có tệp mới thì lưu tệp và xóa tệp cũ
        if ($request->hasFile('text_file')) {
            Storage::disk('public')->delete($architecture->text_file);  // Xóa tệp cũ
            $textFilePath = $request->file('text_file')->store('text_files', 'public');
            $architecture->text_file = $textFilePath;
        }

        $architecture->save();

        return redirect()->route('architecture')->with('success', 'Phong cách kiến trúc đã được cập nhật!');
    }

    // Xóa phong cách kiến trúc
    public function destroy($id)
    {
        $architecture = Architecture::findOrFail($id);

        // Xóa ảnh và tệp .txt
        Storage::disk('public')->delete($architecture->image_url);
        Storage::disk('public')->delete($architecture->text_file);

        // Xóa bản ghi trong cơ sở dữ liệu
        $architecture->delete();

        return redirect()->route('architecture')->with('success', 'Phong cách kiến trúc đã được xóa!');
    }

}
