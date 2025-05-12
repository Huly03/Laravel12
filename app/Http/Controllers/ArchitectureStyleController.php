<?php

namespace App\Http\Controllers;

use App\Models\ArchitectureStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class ArchitectureStyleController extends Controller
{
    /**
     * Hiển thị tất cả ảnh của người dùng.
     */
    
    public function showImages()
    {
        // Lấy tất cả các ảnh từ bảng architecture_styles mà không cần kiểm tra người dùng
        $images = ArchitectureStyle::orderByDesc('detection_time')->get();
        
        // Trả về view với các ảnh
        return view('result_recog.result', compact('images'));
    }
    public function index()
    {
        $user = auth()->user();
        $images = ArchitectureStyle::where('id_user', $user->id)
                    ->orderBy('created_at', 'asc') // Sắp xếp từ cũ đến mới
                    ->get();

        return view('images.index', compact('images'));
    }
    /**
     * Lưu kết quả nhận diện vào cơ sở dữ liệu.
     */
    public function saveRecognitionResult(Request $request)
    {
        // Kiểm tra và xác thực dữ liệu
        $request->validate([
            'image' => 'required|string',      // Đảm bảo ảnh được gửi là một chuỗi
            'style' => 'required|string',      // Phong cách nhận diện
            'detection_time' => 'required|date',  // Thời gian nhận diện
            'user_id' => 'required|integer',   // ID người dùng (nếu cần)
        ]);

        // Lưu kết quả vào bảng architecture_styles
        ArchitectureStyle::create([
            'image' => $request->image,              // Đường dẫn ảnh
            'style' => $request->style,              // Phong cách nhận diện
            'detection_time' => $request->detection_time,  // Thời gian nhận diện
            'id_user' => $request->user_id,          // ID người dùng (nếu có)
        ]);

        return response()->json(['message' => 'Recognition result saved successfully']);
    }

    /**
     * Hiển thị form sửa ảnh.
     */
    public function editImage($id)
    {
        $image = ArchitectureStyle::find($id); // Thay vì findOrFail để không gặp lỗi 404
    
        if (!$image) {
            // Thông báo nếu ảnh không tồn tại
            return redirect()->route('images')->with('error', 'Ảnh không tồn tại');
        }
    
        return view('result_recog.edit', compact('image'));
    }
    
    


    /**
     * Cập nhật ảnh (cả phong cách và ảnh).
     */
    public function updateImage(Request $request, $id)
    {
        $image = ArchitectureStyle::findOrFail($id);
    
        // Xác thực dữ liệu
        $request->validate([
            'style' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',   // Ảnh mới (tùy chọn)
        ]);
    
        // Cập nhật phong cách
        $image->style = $request->input('style');
    
        // Nếu có ảnh mới, lưu ảnh mới và cập nhật đường dẫn ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $image->image = $imagePath;  // Cập nhật đường dẫn ảnh
        }
    
        $image->save();  // Lưu thay đổi
    
        return redirect()->route('images')->with('success', 'Ảnh đã được cập nhật.');
    }
    

    /**
     * Xóa ảnh khỏi cơ sở dữ liệu.
     */
    public function deleteImage($id)
    {
        // Tìm ảnh theo ID
        $image = ArchitectureStyle::findOrFail($id);
    
        // Xóa ảnh
        $image->delete();
    
        return redirect()->route('images.index')->with('success', 'Ảnh đã được xóa thành công.');
    }
    
}
