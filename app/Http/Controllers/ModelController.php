<?php

// app/Http/Controllers/ModelController.php
namespace App\Http\Controllers;

use App\Models\LlmKey;  // Import model
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ModelController extends Controller
{
    // Hiển thị form và danh sách các mô hình với trạng thái
    public function showForm()
    {
        $llmKeys = LlmKey::orderByRaw('status')->get(); // Sắp xếp active lên đầu, inactive xuống dưới
        return view('model-selection', compact('llmKeys'));  // Lấy tất cả mô hình từ bảng llm_keys
    }

    // Xử lý khi người dùng gửi form để thêm mô hình mới
    public function submitSelection(Request $request)
    {
        $llmName = $request->input('llm_name');
        $keyApi = $request->input('key_api');

        // Đảm bảo chỉ có 1 mô hình active, nếu có mô hình active thì cập nhật trạng thái thành inactive
        LlmKey::where('status', 'active')->update(['status' => 'inactive']);

        // Lưu mô hình mới với trạng thái active
        $llmKey = LlmKey::create([
            'llm_name' => $llmName,
            'api_key' => $keyApi,
            'status' => 'active',
        ]);

        // Gửi yêu cầu đến backend LLM (dự án LLM)
        $client = new Client();
        $response = $client->post('http://127.0.0.1:5000/process_model', [
            'json' => [
                'llm_name' => $llmName,
                'key_api' => $keyApi,
            ]
        ]);

        // Xử lý phản hồi từ API LLM
        $data = json_decode($response->getBody()->getContents(), true);

        // Trả về kết quả về cho người dùng
        return redirect()->route('model-selection')->with('data', $data);
    }

    // Xử lý khi người dùng chọn "Sử dụng" để chuyển trạng thái thành active
    public function useModel($id)
    {
        // Đảm bảo chỉ có 1 mô hình active
        LlmKey::where('status', 'active')->update(['status' => 'inactive']);
        
        // Cập nhật mô hình đã chọn thành active
        $llmKey = LlmKey::findOrFail($id);
        $llmKey->status = 'active';
        $llmKey->save();

        return redirect()->route('model-selection')->with('status', 'Mô hình đã được chuyển thành active');
    }

    // Xóa mô hình khỏi cơ sở dữ liệu
    public function deleteModel($id)
    {
        // Xóa mô hình
        $llmKey = LlmKey::findOrFail($id);
        $llmKey->delete();

        return redirect()->route('model-selection')->with('status', 'Mô hình đã bị xóa');
    }
}
