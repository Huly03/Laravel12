<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;  
use App\Models\ArchitectureModel;  

use App\Models\Project;  // Đảm bảo bạn có mô hình Architecture
// Đảm bảo bạn có mô hình Architecture
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Lấy tất cả các phong cách kiến trúc từ bảng architectures
        $architectures = Architecture::all();  // Lấy tất cả bản ghi
        $architecture_models = ArchitectureModel::all();
        // Trả về view dashboard của admin và truyền dữ liệu phong cách kiến trúc
        // Lấy tất cả dự án từ cơ sở dữ liệu
        $projects = Project::all();
        $name = Project::distinct('name')->count();
        $completedProjects = Project::where('status', 'Đã hoàn thành')->count();
        $inProgressProjects = Project::where('status', 'Đang thi công')->count();
        // Trả về view dashboard và truyền dữ liệu dự án
        return view('admin.dashboard', compact('architectures', 'projects', 'completedProjects', 'inProgressProjects','architecture_models', 'name'));
    }
    
    

}
