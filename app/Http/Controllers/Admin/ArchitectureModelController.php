<?php

// app/Http/Controllers/Admin/ArchitectureModelController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchitectureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class ArchitectureModelController extends Controller
{
    // Phương thức index hiển thị danh sách models
    public function index()
    {
        $models = ArchitectureModel::latest()->get();
        return view('admin.models.index', compact('models'));
    }

    // Phương thức store để thêm model mới

    public function store(Request $req)
    {
        // Validate dữ liệu đầu vào
        $req->validate([
            'name' => 'required|string|max:255',
            'train_name' => 'required|file|mimes:txt|max:102400', // Kiểm tra file .txt
            'model_file' => 'required|file|max:512000', // Kiểm tra file model
        ]);

       // Di chuyển file .txt vào thư mục public/storage/train_names
        $train_nameFile = $req->file('train_name');  // Đây là file .txt
        $train_nameFileName = $train_nameFile->getClientOriginalName();  // Lấy tên gốc của file .txt
        $train_namePath = 'C:/xampp/htdocs/laravel_12/public/storage/train_names/' . $train_nameFileName;  // Đặt tên và đường dẫn tương đối cho file .txt

        // Di chuyển file vào thư mục public/storage/train_names
        $train_nameFile->move(public_path('storage/train_names'), $train_nameFileName);

        // Di chuyển file model vào thư mục public/storage/models
        $modelFile = $req->file('model_file');  // Đây là file model
        $modelFileName = $modelFile->getClientOriginalName();  // Lấy tên gốc của file model
        $modelFilePath = 'C:/xampp/htdocs/laravel_12/public/storage/models/' . $modelFileName;  // Đặt tên và đường dẫn tương đối cho file model

        // Di chuyển file model vào thư mục public/storage/models
        $modelFile->move(public_path('storage/models'), $modelFileName);
        // Lưu dữ liệu vào database
        ArchitectureModel::create([
            'name' => $req->name,
            'name_train' => $train_namePath, // Lưu đường dẫn file .txt
            'model_path' => $modelFilePath, // Lưu đường dẫn file model
            'is_active' => 0, // Lưu giá trị mặc định là 0
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Model đã được thêm thành công!');
    }
    // Phương thức update để cập nhật tên của model
    public function update(Request $req, $id)
    {
        $m = ArchitectureModel::findOrFail($id);

        // Validate the name
        $req->validate(['name' => 'required|string|max:255']);

        // Update the model's name
        $m->update(['name' => $req->name]);

        // Redirect back with success message
        return redirect()->route('admin.models.index')->with('success', 'Đã cập nhật thông tin model.');
    }

    // Phương thức destroy để xóa model
    public function destroy($id)
    {
        // Find and delete the model
        ArchitectureModel::findOrFail($id)->delete();

        // Redirect back with success message
        return redirect()->route('admin.models.index')->with('success', 'Đã xóa model.');
    }

    // Phương thức để đánh dấu model "đang sử dụng"
// 

public function use($id)
{
    // Tìm model theo ID
    $model = ArchitectureModel::findOrFail($id);

    // Đánh dấu tất cả các model không sử dụng
    ArchitectureModel::query()->update(['is_active' => false]);

    // Đánh dấu model được chọn là đang sử dụng
// Đánh dấu model được chọn là đang sử dụng
$model->is_active = true;
$model->save();

// Cập nhật model_path và name_train vào Flask
$this->updateFlaskModelPath($model->model_path, $model->name_train);


    return back()->with('success', "Đã chọn model “{$model->name}” để sử dụng.");
}

// Hàm cập nhật đường dẫn mô hình vào Flask API
// Hàm cập nhật đường dẫn mô hình và thư mục train vào Flask API
protected function updateFlaskModelPath($modelPath, $nameTrain)
{
    $response = Http::post('http://127.0.0.1:5000/api/update_model', [
        'model_path' => 'storage/' . $modelPath,  // TƯƠNG ĐỐI thôi
        'name_train' => $nameTrain
    ]);

    if ($response->failed()) {
        Log::error("Failed to update model path in Flask API", ['model_path' => $modelPath, 'name_train' => $nameTrain]);
        return response()->json(['error' => 'Failed to update model path in Flask API'], 500);
    }

    Log::info("Model path and train_dir updated in Flask API successfully", ['model_path' => $modelPath, 'name_train' => $nameTrain]);
}


}
