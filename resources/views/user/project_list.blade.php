<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách dự án</title>
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

        .header img {
            height: 100%;
            width: auto;
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
            z-index: 1000;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
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
            position: absolute;
            top: -15px;
            left: -30px;
            z-index: 1;
        }

        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .card {
            height: 100%;
            margin-bottom: 20px;
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

        .container {
            position: relative;
        }
    </style>
</head>
<body>

<!-- Header + Navbar -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/user">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/user">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/upload">Nhận diện kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Phong cách kiến trúc</a></li>
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
    <h3 class="text-center">Architecture</h3>
    <a href="#">Accounts</a>
    <a href="#">Settings</a>
    <a href="#">Reports</a>
    <a href="/login">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content" id="main-content">
    <div class="container">
        <!-- Toggle Sidebar -->
        <button class="toggle-btn open-btn" id="open-btn"><i class="fas fa-bars"></i></button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;"><i class="fas fa-times"></i></button>

        <h2 class="mb-4">Danh sách dự án</h2>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $project->image_url) }}" class="card-img-top" alt="{{ $project->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text"><strong>Loại dự án:</strong> {{ $project->project_type }}</p>
                            <p class="card-text"><strong>Trạng thái:</strong> {{ $project->status }}</p>
                            <p class="card-text"><strong>Giá:</strong> {{ number_format($project->price, 2) }} VNĐ</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<x-footer />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle
    let sidebarOpen = false;
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
