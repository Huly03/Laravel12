<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phong cách kiến trúc</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container">
    <h2 class="mt-5">Thêm Phong Cách Kiến Trúc</h2>

    <form action="{{ route('architecture') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên Phong Cách Kiến Trúc:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên phong cách" required>
        </div>

        <div class="form-group">
            <label for="image_url">Ảnh:</label>
            <input type="file" id="image_url" name="image_url" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="text_file">Tệp TXT:</label>
            <input type="file" id="text_file" name="text_file" class="form-control-file" accept=".txt" required>
        </div>
        <div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif
        </div>
    </form>
</div>

<!-- Footer -->
<x-footer/>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
