<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Architecture;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\WebsiteConfig;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả các phong cách kiến trúc từ bảng architectures
        $architectures = Architecture::all();
        $website_configs = WebsiteConfig::first();
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
        return view('home', [
            'config' => $website_configs,
            'architectures' => $architectures,
            'projects' => $projects,
            'totalProjects' => $totalProjects,
            'completedProjects' => $completedProjects,
            'inProgressProjects' => $inProgressProjects,
            'username' => $user ? $user->username : 'Guest' // Truyền username vào view
        ]);
    }
}
