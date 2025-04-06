<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa {{ $architecture->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<x-header />

<div class="container mt-4">
    <h2>Chỉnh sửa phong cách kiến trúc</h2>

    <form action="{{ route('architecture.update', $architecture->id) }}" method="POST" enctype="multipart/form-data">
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
        </div>

        <div class="mb-3">
            <label for="text_file" class="form-label">Tệp thông tin</label>
            <input type="file" class="form-control" id="text_file" name="text_file">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
