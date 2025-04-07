<?php

namespace App\Http\Controllers;

use App\Models\ApiCall;
use Illuminate\Http\Request;

class ApiCallController extends Controller
{
    // Hiển thị danh sách API đã gọi
    public function index()
    {
        // Lấy danh sách API đã gọi, phân trang nếu cần
        $apiCalls = ApiCall::with('user')->latest()->paginate(10);  // Hiển thị mới nhất, phân trang

        // Trả về view api_calls.index và truyền dữ liệu apiCalls
        return view('api_calls.index', compact('apiCalls'));  // Truyền $apiCalls vào view
    }

    // Xóa một API call
    public function destroy($id)
    {
        // Tìm API call theo id
        $apiCall = ApiCall::findOrFail($id);
        
        // Xóa API call
        $apiCall->delete();

        // Redirect lại với thông báo thành công
        return redirect()->route('apiCalls.index')->with('success', 'API call đã được xóa thành công!');
    }
}

