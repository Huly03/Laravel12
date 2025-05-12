<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Architecture;
use App\Models\ArchitectureModel;
use App\Models\ArchitectureStyle;
use App\Models\User;
use App\Models\ApiCall;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->level != 1) {
            return redirect()->route('login.show')->with('error', 'Bạn không có quyền truy cập!');
        }

        // Get distinct project count by name
        $projectsCount = Project::distinct('name')->count();
        
        // Get status counts from all projects (not distinct by name)
        $completedProjects = Project::where('status', 'Hoàn thành')->count();
        $inProgressProjects = Project::where('status', 'Đang thi công')->count();
        $designProjects = Project::where('status', 'Pre-construction Phase')->count();

        return view('admin.dashboard', [
            'projectsCount' => $projectsCount,
            'completedProjects' => $completedProjects,
            'inProgressProjects' => $inProgressProjects,
            'designProjects' => $designProjects,
            'usersCount' => User::count(),
            'apiCallsCount' => ApiCall::count(),
            'architecturesCount' => Architecture::count(),
            'architectureModelsCount' => ArchitectureModel::count(),
            'architectureStylesCount' => ArchitectureStyle::count(),
            'architectures' => Architecture::all(),
            'projects' => Project::all()
        ]);
    }
}