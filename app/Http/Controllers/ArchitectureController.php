<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;  // Đảm bảo bạn có mô hình Architecture
use Illuminate\Support\Facades\Storage;
use App\Models\WebsiteConfig;  
class ArchitectureController extends Controller
{
    // Hiển thị form tạo mới
    public function create()
    {
        return view('architecture');
    }
    public function viewOnly()
    {
        $config = WebsiteConfig::first();
        $architectures = Architecture::all(); // Now you can use it directly

        return view('user.architecture_view', compact('architectures', 'config'));
    }
    public function showDetail($id)
{
    $architecture = Architecture::findOrFail($id);
    $config = WebsiteConfig::first();

    // Nếu bạn có logic đọc file .txt hoặc nội dung thêm:
    $textContent = null;

    $filePath = storage_path('app/public/' . $architecture->text_file);
    if (file_exists($filePath)) {
        $textContent = file_get_contents($filePath);
    }

    return view('user.architecture_detail', compact('architecture', 'textContent','config'));
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

    // Hiển thị chi tiết phong cách kiến trúc
    public function show($id)
    {
        $architecture = Architecture::findOrFail($id);

        // Kiểm tra tệp .txt
        $textFilePath = $architecture->text_file;
        if (!Storage::disk('public')->exists($textFilePath)) {
            return abort(404, 'Tệp không tồn tại');
        }

        $textContent = Storage::disk('public')->get($textFilePath); // Đọc nội dung tệp

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

        // Kiểm tra và cập nhật ảnh mới
        if ($request->hasFile('image_url')) {
            // Xóa ảnh cũ nếu có
            Storage::disk('public')->delete($architecture->image_url);
            $imagePath = $request->file('image_url')->store('images', 'public');
            $architecture->image_url = $imagePath;
        }

        // Kiểm tra và cập nhật tệp .txt mới
        if ($request->hasFile('text_file')) {
            // Xóa tệp cũ nếu có
            Storage::disk('public')->delete($architecture->text_file);
            $textFilePath = $request->file('text_file')->store('text_files', 'public');
            $architecture->text_file = $textFilePath;
        }

        $architecture->save();

        return redirect()->route('architecture.index')->with('success', 'Phong cách kiến trúc đã được cập nhật!');
    }

    // Xóa phong cách kiến trúc
    public function destroy($id)
    {
        $architecture = Architecture::findOrFail($id);

        // Xóa ảnh và tệp .txt
        Storage::disk('public')->delete($architecture->image_url);
        Storage::disk('public')->delete($architecture->text_file);

        $architecture->delete();

        return redirect()->route('architecture')->with('success', 'Phong cách kiến trúc đã được xóa!');
    }
}