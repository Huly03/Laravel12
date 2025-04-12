<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Dự Án Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header styling */
        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        /* Logo in the header */
        .header img {
            height: 60px;
            width: auto;
        }

        /* Navbar styling */
        .navbar {
            background-color: #333;
        }

        .navbar .navbar-brand {
            color: white;
            padding: 0;
        }

        .navbar .navbar-nav .nav-link {
            color: white;
            font-weight: 600;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/admin">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/architecture">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/project">Dự án</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Main content -->
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
<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
