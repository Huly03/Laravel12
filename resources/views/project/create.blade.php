<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Dự Án Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<x-header/>
<div class="container mt-4">
    <h2>Tạo Dự Án Mới</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên Dự Án</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="project_type" class="form-label">Loại Dự Án</label>
            <input type="text" class="form-control" id="project_type" name="project_type">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Ảnh Dự Án</label>
            <input type="file" class="form-control" id="image_url" name="image_url" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá Dự Án</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary">Lưu Dự Án</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
