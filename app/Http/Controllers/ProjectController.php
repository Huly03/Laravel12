<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;  // Import model Project
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // hoặc paginate nếu muốn
        return view('user.project_list', compact('projects'));
    }
// Hiển thị form tạo mới dự án
public function create()
{
    return view('project.create');
}

// Xử lý lưu dự án vào cơ sở dữ liệu
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'project_type' => 'nullable|max:255',
        'status' => 'nullable|max:255',
        'image_url' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048', // Kiểm tra ảnh
        'price' => 'required|numeric|min:0',
    ]);

    // Lưu ảnh
    $imagePath = $request->file('image_url')->store('images', 'public');

    // Lưu dữ liệu vào cơ sở dữ liệu
    $project = new Project();
    $project->name = $request->input('name');
    $project->project_type = $request->input('project_type');
    $project->status = $request->input('status');
    $project->image_url = $imagePath;
    $project->price = $request->input('price');
    $project->save();

    return redirect()->route('project.create')->with('success', 'Dự án đã được thêm thành công!');
}
    public function edit($id)
    {
        $project = Project::findOrFail($id);  // Lấy dự án theo ID
        return view('project.edit', compact('project'));  // Trả về view chỉnh sửa
    }

    // Lưu chỉnh sửa dự án
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        // Validate input
        $request->validate([
            'name' => 'required|max:255',
            'project_type' => 'required|max:255',
            'status' => 'required|max:255',
            'price' => 'required|numeric',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Cập nhật thông tin dự án
        $project->name = $request->input('name');
        $project->project_type = $request->input('project_type');
        $project->status = $request->input('status');
        $project->price = $request->input('price');

        // Kiểm tra nếu có ảnh mới
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('projects', 'public');
            $project->image_url = $imagePath;
        }

        $project->save();  // Lưu lại dự án đã chỉnh sửa

        return redirect()->route('admin.dashboard')->with('success', 'Dự án đã được chỉnh sửa thành công!');
    }

    // Xóa dự án
    public function destroy($id)
    {
        $project = Project::findOrFail($id);  // Lấy dự án theo ID
        $project->delete();  // Xóa dự án khỏi cơ sở dữ liệu

        return redirect()->route('admin.dashboard')->with('success', 'Dự án đã được xóa thành công!');
    }
}
