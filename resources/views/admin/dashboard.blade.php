<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
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
            height: 100%;
            width: auto;
        }

        /* Navbar styling */
        .navbar {
            background-color: #333;
        }

        .navbar .navbar-brand {
            color: white;
            padding: 0;
            z-index: 1; 

        }

        .navbar .navbar-nav .nav-link {
            color: white;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
        }

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px; /* Sidebar hidden by default */
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

        /* Sidebar toggle buttons */
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

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin-bottom: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
        }

        /* Container */
        .container {
            position: relative; /* To position toggle buttons within it */
        }

        /* Position toggle buttons */
        .open-btn, .close-btn {
            position: absolute;
            top: -15px;
            left: -30px;
            z-index: 1; /* Ensure the button is above content */
        }
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
            height: 100%;
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
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
        }

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px; /* Sidebar hidden by default */
            width: 250px;
            min-height: 100%;
            background-color: #f5f5dc;
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 0;
            transition: left 0.3s ease;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
                </a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="/admin">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="/architecture"> Phong cách kiến trúc</a></li>
                        <li class="nav-item"><a class="nav-link" href="/project">Dự án</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Admin</h3>
        <a href="/result"><i class="fas fa-search"></i> Kết quả</a>
        <a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Danh sách tài khoản</a>
        <a href="/api-calls"><i class="fas fa-cogs"></i> API</a>
        <a href="/login"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <div class="container">
            <!-- Move toggle buttons here -->
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>

            <!-- Your main content here -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-header">Tổng các dự án</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalProjects }}</h5>
                            <p class="card-text">Các dự án đã và đang hoàn thành</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-success">
                        <div class="card-header">Đã hoàn thành</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $completedProjects }}</h5>
                            <p class="card-text">Các dự án đã được hoàn thành</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-danger">
                        <div class="card-header">Đang thi công</div>
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
    <div class="main-content" id="main-content">
    <h2>Danh sách dự án</h2>
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
                        
                        <!-- Dropdown button -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i> <!-- Icon 3 chấm -->
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Chỉnh sửa dự án -->
                                <li><a class="dropdown-item" href="{{ route('project.edit', $project->id) }}">Chỉnh sửa</a></li>
                                
                                <!-- Xóa dự án -->
                                <li>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE') <!-- Chỉ định phương thức DELETE -->
                                        <button type="submit" class="dropdown-item btn btn-danger">Xóa</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    </div>

    <!-- Footer (you can create a footer component as needed) -->
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mặc định sidebar đóng và hiển thị nút "open"
        let sidebarOpen = false;

        // Mở sidebar khi click vào nút "open"
        document.getElementById('open-btn').addEventListener('click', function() {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0'; // Mở sidebar
            document.getElementById('main-content').style.marginLeft = '250px'; // Dịch chuyển nội dung
            document.getElementById('open-btn').style.display = 'none'; // Ẩn nút "open"
            document.getElementById('close-btn').style.display = 'block'; // Hiển thị nút "close"
        });

        // Đóng sidebar khi click vào nút "close"
        document.getElementById('close-btn').addEventListener('click', function() {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px'; // Đóng sidebar
            document.getElementById('main-content').style.marginLeft = '0'; // Trả lại margin cho nội dung
            document.getElementById('open-btn').style.display = 'block'; // Hiển thị nút "open"
            document.getElementById('close-btn').style.display = 'none'; // Ẩn nút "close"
        });
    </script>
</body>
</html>
