<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách ảnh của bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin-top: 30px;
        }

        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 100%;
            position: relative;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-weight: bold;
            color: #333;
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
        }

        .btn {
            font-size: 0.9rem;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .col-md-4 {
            width: 100%;
        }

        .col-lg-3 {
            width: 25%;
        }

        .text-center {
            text-align: center;
        }

        .g-4 {
            gap: 20px;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .card-body {
            padding: 20px;
            flex-grow: 1;
        }

        .alert {
            background-color: #e2e3e5;
            color: #6c757d;
            border-radius: 10px;
            padding: 10px;
        }

        /* Flexbox adjustments for centering cards */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centers the cards horizontally */
            gap: 20px; /* Adds gap between the cards */
        }

        /* Ensures that cards take up 25% width on large screens, 33% on medium, and 50% on smaller screens */
        .col-md-4 {
            flex: 1 0 33%;
            max-width: 33%;
        }

        .col-lg-3 {
            flex: 1 0 25%;
            max-width: 25%;
        }

        @media (max-width: 1200px) {
            .col-lg-3 {
                flex: 1 0 33%;
                max-width: 33%;
            }
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 1 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 576px) {
            .col-md-4 {
                flex: 1 0 100%;
                max-width: 100%;
            }
        }

        .container {
            position: relative;
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
        .open-btn,
        .close-btn {
            position: absolute;
            top: -45px;
            left: -30px;
            z-index: 1;
            /* Ensure the button is above content */
        }
    </style>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/user">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
                </a>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="/user">Trang chủ</a></li>
                        @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Nhận diện
                                kiến trúc</a>
                        @else
                            <a class="nav-link" href="#">Nhận diện kiến trúc (Chưa đăng nhập)</a>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Phong cách kiến
                                trúc</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/projects">Dự án</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->username }}</a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Thông tin của tôi</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Kết quả</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>

    <div class="main-content" id="main-content">
        <div class="container">
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-center text-primary mb-4">Danh sách ảnh của bạn</h2>

            @if($images->isEmpty())
                <p class="text-center">Bạn chưa tải lên bất kỳ ảnh nào.</p>
            @else
                <div class="row g-4">
                    @foreach($images as $image)
                        <div class="col-md-4 col-lg-3">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="{{ $image->style }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->style }}</h5>
                                    <p class="card-text">{{ $image->style }}</p>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('editImage', $image->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('deleteImage', $image->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
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
