<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            min-height: 100vh; /* Đảm bảo body có đủ chiều cao */
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 95px; /* Dịch xuống dưới header */
            left: -250px; /* Sidebar ẩn khi mới tải trang */
            width: 250px;
            min-height: 100%; /* Đảm bảo sidebar kéo dài tới footer */
            background-color: #f5f5dc; /* Nền be cho sidebar */
            color: black; /* Màu chữ đen */
            padding-top: 20px;
            overflow-y: auto; /* Thêm khả năng cuộn cho sidebar khi nội dung quá dài */
            z-index: 0;
            transition: left 0.3s ease; /* Thêm hiệu ứng khi mở/đóng sidebar */
        }

        .sidebar a {
            color: black; /* Màu chữ đen cho các liên kết */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #f5f5dc; /* Nền be cho liên kết */
            transition: background-color 0.3s ease; /* Thêm hiệu ứng khi hover */
        }

        .sidebar a:hover {
            background-color: #d4e157; /* Màu nền khi hover (xanh sáng) */
            color: white; /* Màu chữ trắng khi hover */
        }

        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .card {
            margin-bottom: 20px;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 999;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }

    </style>
</head>
<body>
<div>
    <!-- Gọi Component Header của Laravel -->
    <x-header />

    <!-- Hamburger button fixed in header -->
    <button class="toggle-btn open-btn" id="open-btn">
        <i class="fas fa-bars"></i>
    </button>
    <button class="toggle-btn close-btn" id="close-btn">
        <i class="fas fa-times"></i>
    </button>
</div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    <h3 class="text-center">
    Welcome, {{ $username }}  <!-- Hiển thị username của người dùng -->
</h3>
        <a href="#">Home</a>
        <a href="{{ route('user.images', ['id' => Auth::id()]) }}">Result</a>
        <a href="#">Settings</a>
        <a href="#">Reports</a>
        <a href="/login">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <h2>Danh sách dự án</h2>

        <div class="row">
            <!-- Tổng các dự án -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        Tổng các dự án
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalProjects }}</h5>
                        <p class="card-text">Các dự án đã và đang hoàn thành</p>
                    </div>
                </div>
            </div>

            <!-- Dự án đã hoàn thành -->
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        Đã hoàn thành
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $completedProjects }}</h5>
                        <p class="card-text">Các dự án đã được hoàn thành</p>
                    </div>
                </div>
            </div>

            <!-- Dự án đang thi công -->
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">
                        Đang thi công
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $inProgressProjects }}</h5>
                        <p class="card-text">Các dự án đang được thi công</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h3>Phong cách kiến trúc</h3>
            <div class="row">
                @foreach($architectures as $architecture)
                    <div class="col-md-4">
                        <div class="card" onclick="window.location='{{ route('architecture.show', $architecture->id) }}'">
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
    
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let sidebarOpen = false;

        document.getElementById('open-btn').addEventListener('click', function() {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0';
            document.getElementById('main-content').style.marginLeft = '250px';
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px';
            document.getElementById('main-content').style.marginLeft = '0';
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });
    </script>
</body>
</html>
