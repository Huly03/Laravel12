<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ApiCall;// Import đúng model ApiCall
use App\Models\ArchitectureStyle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    // Hiển thị form tải ảnh lên
    public function showForm($id)
    {
        // Kiểm tra nếu user_id từ session không khớp với id trong URL
        if (session('user_id') != $id) {
            return redirect()->route('login.show');  // Nếu không khớp, chuyển hướng người dùng đến trang login
        }

        // Trả về view upload và truyền user_id vào view
        return view('upload', ['user_id' => $id]);
    }
    public function uploadImage(Request $request, $id)
    {
        // Kiểm tra xem ảnh có được upload hay không
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image uploaded'], 400);
        }

        $imageFile = $request->file('image');

        // Kiểm tra loại file và kích thước file (nếu cần)
        if (!$imageFile->isValid()) {
            return response()->json(['error' => 'Invalid file uploaded'], 400);
        }

        // Lưu ảnh vào thư mục uploads trong storage
        $imagePath = $imageFile->store('uploads', 'public');
        Log::info("Image uploaded successfully", ['image_path' => $imagePath]);

        // Tên API sẽ gọi đến Flask API để nhận diện
        $apiName = '/api/detect';  // Lấy tên API gọi

        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            // Gọi Flask API để nhận diện ảnh
            $response = Http::attach(
                'image',
                file_get_contents($imageFile->getRealPath()),
                'image.jpg'
            )->post('http://127.0.0.1:5000/api/detect');

            // Kiểm tra nếu có lỗi từ Flask API
            if ($response->failed()) {
                Log::error("Flask API call failed", ['response' => $response->body()]);
                return response()->json(['error' => 'Flask API error'], 500);
            }

            $result = $response->json();

            // Kiểm tra kết quả trả về từ Flask
            if (
                !isset($result['top_5_labels']) ||
                !isset($result['top_5_probs']) ||
                count($result['top_5_labels']) === 0
            ) {
                Log::error("Invalid result from Flask", ['result' => $result]);
                return response()->json(['error' => 'Invalid result from Flask'], 400);
            }

            // Kiểm tra nếu tồn tại ít nhất một phong cách và xác suất trong mảng
            if (isset($result['top_5_labels'][0]) && isset($result['top_5_probs'][0])) {
                $topStyle = $result['top_5_labels'][0];
            } else {
                Log::error("Flask API returned empty labels or probabilities", ['result' => $result]);
                return response()->json(['error' => 'Flask API returned empty labels or probabilities'], 400);
            }

            // Log dữ liệu trước khi lưu vào bảng api_calls
            Log::info("Saving API call log", [
                'api_name' => $apiName,  // Lưu tên API gọi
                'user_id' => $id,
                'ip_address' => $request->ip(),
            ]);

            // Lưu log vào bảng api_calls
            ApiCall::create([
                'api_name' => $apiName,  // Sử dụng "/api/detect" làm api_name
                'user_id' => $id,  // Lấy user_id từ URL
                'ip_address' => $request->ip(),  // Lấy địa chỉ IP người dùng
                'timestamp' => now(),  // Thời gian tạo bản ghi
            ]);

            // Lưu kết quả nhận diện vào bảng architecture_styles
            Log::info("Saving architecture style result", [
                'image' => $imagePath,
                'style' => $topStyle,
                'user_id' => $id,
            ]);

            ArchitectureStyle::create([
                'image' => $imagePath,
                'style' => $topStyle,
                'detection_time' => now(),
                'id_user' => $id,
            ]);

            // Commit transaction
            DB::commit();

            return response()->json([
                'imagePath' => $imagePath,
                'result' => $result,
                'message' => 'Upload successful',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();  // Rollback nếu có lỗi xảy ra
            Log::error("Error during upload process", ['error_message' => $e->getMessage()]);
            return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
        }
    }

    public function chatWithBot(Request $request)
    {
        if (!$request->has('user_input')) {
            return response()->json(['error' => 'No input provided'], 400);
        }

        $response = Http::post('http://127.0.0.1:5000/api/chatbot', [
            'user_input' => $request->input('user_input'),
            'language' => 'vi'
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Chatbot failed'], 500);
        }

        return response()->json($response->json());
    }

    // Phương thức gọi API tìm kiếm với từ khóa
    public function searchQuery(Request $request)
    {
        $searchQuery = $request->input('query');
        \Log::info("Search query sent to Flask: " . $searchQuery);  // Log dữ liệu

        $response = Http::post('http://127.0.0.1:5000/search', [
            'query' => $searchQuery
        ]);

        if ($response->failed()) {
            \Log::error("Error calling Flask API: " . $response->body());  // Log lỗi nếu có
            return response()->json(['error' => 'Error while calling Flask API'], 500);
        }

        // Log phản hồi từ Flask
        \Log::info("Response from Flask: " . json_encode($response->json()));

        // Trả về kết quả cho frontend
        return response()->json($response->json());
    }


}