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
            position: relative; /* Added position relative */
        }

        h2, .img-fluid {
            text-align: center;  /* Căn giữa text và ảnh */
            width: auto;
        }

        .img-fluid {
            width: auto;       /* Để chiều rộng tự động */
            height: 250px;     /* Đặt chiều cao cố định cho ảnh */
            margin-top: 20px;
            margin-bottom: 20px;
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

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* Nút 3 chấm */
        .dropdown-toggle::after {
            display: none;  /* Ẩn mũi tên dropdown mặc định */
        }

        .dropdown-menu {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 999;
        }

        /* Style hover cho các lựa chọn dropdown */
        .dropdown-item:hover {
            background-color: #f0f0f0;
        }

    </style>
</head>
<body>

<x-header />

<div class="container">
    <!-- Đặt nút dropdown vào container -->
    <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i> <!-- Icon 3 chấm -->
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Liên kết chỉnh sửa -->
            <li><a class="dropdown-item" href="{{ route('architecture.edit', $architecture->id) }}">Chỉnh sửa</a></li>
            <!-- Form xóa -->
            <li>
                <form action="{{ route('architecture.destroy', $architecture->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item text-danger">Xóa</button>
                </form>
            </li>
        </ul>
    </div>
    <h2>{{ $architecture->name }}</h2>
    <img src="{{ asset('storage/' . $architecture->image_url) }}" class="img-fluid" alt="{{ $architecture->name }}">

    <h4>Mô tả</h4>
    <p>{{ $architecture->description }}</p>

    <h4>Thông tin chi tiết từ tệp</h4>
    <pre>{{ $textContent ?? 'Không có thông tin chi tiết từ tệp' }}</pre>
</div>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
