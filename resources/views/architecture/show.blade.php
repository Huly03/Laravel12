<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $architecture->name }} - Chi tiết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tổng thể body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }

        /* Container chính */
        .container {
            margin-top: 40px;
            background-color: white;
            border-radius: 8px;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2, .img-fluid {
        text-align: center;  /* Căn giữa text và ảnh */
        width: 100%;
        }
        /* Tiêu đề chính */
        h2 {
            font-size: 36px;
            font-weight: 600;
            color: #333;
        }

        /* Mô tả phong cách */
        h4 {
            font-size: 24px;
            margin-top: 20px;
            font-weight: 500;
            color: #666;
        }

        p {
            font-size: 16px;
            color: #444;
            line-height: 1.6;
        }

        /* Ảnh */
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            
            
        }

        /* Phần thông tin chi tiết */
        pre {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', Courier, monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }

        /* Nút quay lại */
        .back-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>{{ $architecture->name }}</h2>
    <img src="{{ asset('storage/' . $architecture->image_url) }}" class="img-fluid" alt="{{ $architecture->name }}">

    <h4>Mô tả</h4>
    <p>{{ $architecture->description }}</p>

    <h4>Thông tin chi tiết từ tệp</h4>
    <pre>{{ $textContent ?? 'Không có thông tin chi tiết từ tệp' }}</pre>
</div>

<!-- Nút quay lại luôn hiển thị trên màn hình -->
<button class="back-btn" onclick="window.location='{{ route('admin.dashboard') }}'">
    Trang chủ
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
