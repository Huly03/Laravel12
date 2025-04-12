<?php
namespace App\Http\Controllers;

use App\Models\ArchitectureStyle; // Model của bảng architecture_styles
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class ImageController extends Controller
{
    public function index()
    {
        // Lấy người dùng đã đăng nhập
        $user = auth()->user(); // Lấy người dùng đã đăng nhập

        // Lọc các hình ảnh của người dùng hiện tại từ bảng architecture_styles theo id_user
        $images = ArchitectureStyle::where('id_user', $user->id)->get();

        return view('images.index', compact('images')); // Trả về view với danh sách hình ảnh của người dùng
    }
}

