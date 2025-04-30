<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa {{ $architecture->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Đặt khoảng cách giữa các phần tử và tạo sự thoáng đãng */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /* Cải thiện phong cách cho form */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            border-radius: 5px;
            padding: 10px 20px;
        }

        /* Tạo khoảng cách giữa các trường input */
        .mb-3 {
            margin-bottom: 20px;
        }

        /* Định dạng ảnh nhỏ lại */
        .img-fluid {
            width: 100px;
            height: 100px;
            margin-top: 10px;
            border-radius: 8px;
        }

        /* Tạo hiệu ứng hover cho ảnh */
        .img-fluid:hover {
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        /* Làm nổi bật phần tiêu đề */
        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>

<x-header />

<div class="container mt-4">
    <h2>Chỉnh sửa phong cách kiến trúc</h2>

    <form action="{{ route('architecture.edit', $architecture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên phong cách</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $architecture->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $architecture->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Ảnh phong cách</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
            <img src="{{ asset('storage/' . $architecture->image_url) }}" class="img-fluid" alt="{{ $architecture->name }}">
        </div>

        <div class="mb-3">
            <label for="text_file" class="form-label">Tệp thông tin</label>
            <input type="file" class="form-control" id="text_file" name="text_file">
            <img src="{{ asset('storage/' . $architecture->image_url) }}" class="img-fluid" alt="{{ $architecture->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
