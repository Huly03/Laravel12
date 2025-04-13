<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $architecture->name }} - Chi tiết</title>
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
            z-index: 0;
            transition: left 0.3s ease;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #f5f5dc;
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
            margin-top: 40px;
            background-color: white;
            border-radius: 8px;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: relative;
        }

        h2, .img-fluid {
            text-align: center;
            width: auto;
        }

        .img-fluid {
            width: auto;
            height: 250px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 36px;
            font-weight: 600;
            color: #333;
        }

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

        .open-btn, .close-btn {
            position: absolute;
            top: -55px;
            left: -30px;
            z-index: 1;
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
                    <li class="nav-item"><a class="nav-link" href="/user">Trang chủ</a></li>
                    @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Nhận diện
                                kiến trúc</a>
                        @else
                            <a class="nav-link" href="#">Nhận diện kiến trúc (Chưa đăng nhập)</a>
                        @endif

                    <li class="nav-item"><a class="nav-link active" href="/user/architectures/view">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/projects">Dự án</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <!-- Hiển thị username của người dùng đã đăng nhập -->
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->username }}</a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Thông tin của tôi</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Kết quả</a>        
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>

<!-- Content -->
<div class="main-content" id="main-content">
    <div class="container">
        <!-- Toggle Sidebar -->
        <button class="toggle-btn open-btn" id="open-btn"><i class="fas fa-bars"></i></button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;"><i class="fas fa-times"></i></button>

        <!-- Nội dung chính -->
        <h2>{{ $architecture->name }}</h2>
        <img src="{{ asset('storage/' . $architecture->image_url) }}" class="img-fluid" alt="{{ $architecture->name }}">

        <h4>Mô tả</h4>
        <p>{{ $architecture->description }}</p>

        <h4>Thông tin chi tiết từ tệp</h4>
        <pre>{{ $textContent ?? 'Không có thông tin chi tiết từ tệp' }}</pre>
    </div>
</div>

<!-- Footer -->
<x-footer />

<!-- Script toggle sidebar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let sidebarOpen = false;

    document.getElementById('open-btn').addEventListener('click', function () {
        sidebarOpen = true;
        document.getElementById('sidebar').style.left = '0';
        document.getElementById('main-content').style.marginLeft = '250px';
        document.getElementById('open-btn').style.display = 'none';
        document.getElementById('close-btn').style.display = 'block';
    });

    document.getElementById('close-btn').addEventListener('click', function () {
        sidebarOpen = false;
        document.getElementById('sidebar').style.left = '-250px';
        document.getElementById('main-content').style.marginLeft = '0';
        document.getElementById('open-btn').style.display = 'block';
        document.getElementById('close-btn').style.display = 'none';
    });
</script>
</body>
</html>
