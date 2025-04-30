<?php
// app/Http/Controllers/RecognitionController.php
namespace App\Http\Controllers;
use GuzzleHttp\Client;

use App\Http\Controllers\Controller;
use App\Models\ArchitectureModel;
use Illuminate\Http\Request;
class RecognitionController extends Controller
{
    public function recognize(Request $request)
    {
        // Lấy mô hình hiện tại từ cơ sở dữ liệu
        $model = ArchitectureModel::where('is_active', true)->first();
        
        if (!$model) {
            return response()->json(['error' => 'No active model found'], 400);
        }

        // Gửi yêu cầu tới API Python với mô hình hiện tại
        $client = new Client();
        $response = $client->post('http://127.0.0.1:5000/api/detect', [
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen($request->file('image')->getPathname(), 'r')
                ],
                [
                    'name' => 'model_path',
                    'contents' => storage_path('app/' . $model->model_path),  // Đường dẫn mô hình
                ],
                [
                    'name' => 'train_dir',
                    'contents' => storage_path('app/' . $model->train_dir), // Đường dẫn thư mục huấn luyện
                ]
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return response()->json([
            'top_5_labels' => $data['top_5_labels'],
            'top_5_probs' => $data['top_5_probs'],
        ]);
    }
}
