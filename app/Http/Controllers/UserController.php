<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Lấy tất cả các phong cách kiến trúc từ bảng architectures
        $architectures = Architecture::all();

        // Lấy tất cả dự án từ cơ sở dữ liệu
        $projects = Project::all();
        $totalProjects = Project::count();
        $completedProjects = Project::where('status', 'Đã hoàn thành')->count();
        $inProgressProjects = Project::where('status', 'Đang thi công')->count();

        // Lấy user_id từ session
        $user_id = session('user_id');  // Lấy user_id từ session

        // Truy vấn thông tin người dùng từ bảng accounts
        $user = DB::table('users')->where('id', $user_id)->first();

        // Trả về view dashboard và truyền dữ liệu
        return view('user.dashboard', [
            'architectures' => $architectures,
            'projects' => $projects,
            'totalProjects' => $totalProjects,
            'completedProjects' => $completedProjects,
            'inProgressProjects' => $inProgressProjects,
            'username' => $user ? $user->username : 'Guest' // Truyền username vào view
        ]);
    }
    public function update(Request $request, $id)
    {
        // Tìm người dùng bằng ID
        $user = User::findOrFail($id);

        // Xác thực dữ liệu nhập
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fullname' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Cập nhật thông tin người dùng
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'fullname' => $request->fullname,
            'level' => $request->level,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    // Phương thức xóa người dùng
    public function destroy($id)
    {
        // Tìm người dùng và xóa
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Tài khoản đã được xóa!');
    }
}


    
    


