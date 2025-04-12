<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Phong Cách Kiến Trúc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        .navbar {
            background-color: #333;
        }

        .navbar .navbar-brand {
            color: white;
            padding: 0;
        }

        .navbar .navbar-nav .nav-link {
            color: white;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
        }

        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px;
            width: 250px;
            min-height: 100%;
            background-color: #f5f5dc;
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 0;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #d4e157;
            color: white;
        }

        .toggle-btn {
            background-color: #1f2a3f;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .container {
            position: relative;
        }

        .open-btn, .close-btn {
            position: absolute;
            top: -15px;
            left: -30px;
            z-index: 1;
        }

        .card {
            height: 100%;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<!-- ✅ Header mới đầy đủ navbar -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/user">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/user">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/upload">Nhận diện kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/user/architectures/view">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/project">hahaha</a></li>
                    <li class="nav-item">
                        <form class="form-inline d-inline" id="searchForm">
                            <input type="text" id="searchInput" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h4 class="text-center">Menu</h4>
    <a href="#">Tài khoản</a>
    <a href="#">Cài đặt</a>
    <a href="#">Báo cáo</a>
    <a href="/login">Đăng xuất</a>
</div>

<!-- Main Content -->
<div class="main-content" id="main-content">
    <div class="container">
        <!-- Sidebar Toggle -->
        <button class="toggle-btn open-btn" id="open-btn">
            <i class="fas fa-bars"></i>
        </button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
            <i class="fas fa-times"></i>
        </button>

        <!-- Danh sách phong cách kiến trúc -->
        <h3 class="mb-4">Phong cách kiến trúc</h3>
        <div class="row">
            @foreach($architectures as $architecture)
                <div class="col-md-4 mb-4">
                    <div class="card" onclick="window.location='{{ route('architecture.detail', $architecture->id) }}'">
                        <img src="{{ asset('storage/' . $architecture->image_url) }}" class="card-img-top" alt="{{ $architecture->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $architecture->name }}</h5>
                            <p class="card-text">{{ $architecture->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Sidebar Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('open-btn').addEventListener('click', function () {
        document.getElementById('sidebar').style.left = '0';
        document.getElementById('main-content').style.marginLeft = '250px';
        document.getElementById('open-btn').style.display = 'none';
        document.getElementById('close-btn').style.display = 'block';
    });

    document.getElementById('close-btn').addEventListener('click', function () {
        document.getElementById('sidebar').style.left = '-250px';
        document.getElementById('main-content').style.marginLeft = '0';
        document.getElementById('open-btn').style.display = 'block';
        document.getElementById('close-btn').style.display = 'none';
    });
</script>
</body>
</html>
