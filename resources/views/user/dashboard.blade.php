<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trang web về nhận diện kiến trúc, phong cách và các dự án xây dựng.">
    <meta name="keywords" content="kiến trúc, nhận diện, dự án, phong cách kiến trúc">
    <meta name="author" content="Tên của bạn">
    <title>Trang Chủ - Nhận diện Kiến Trúc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header styling */
        .header
        {
            background-color:whitesmoke ;
            color: whitesmoke;
            padding: 20px 0;
            text-align: center;
            height: 80px;
            z-index: 9999;
            display: flex;
            row-gap: 100px;
            justify-content: center; /* căn giữa theo chiều ngang */
            align-items: center;     /* căn giữa theo chiều dọc */
            text-align: center; 
        }
        .container-fluid
        {
            background-color:whitesmoke;
            
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
        .navbar-expand-lg{
            background-color:whitesmoke;
            text-align: center;

        }
        .navbar .navbar-brand {
            padding: 0;
            background-color:whitesmoke;
        }

        .navbar .navbar-nav .nav-link {
            color: black;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: navy;
        }

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px;
            width: 250px;
            min-height: 100%;
            background-color:ghostwhite;
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
            background-color: ghostwhite;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: navy;
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
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-toggler {
                border: none;
            }

            .navbar-collapse {
                justify-content: center;
            }

            .row {
                flex-direction: column;
            }

            .sidebar {
                left: -250px; /* Sidebar đóng */
            }

            /* Các card sẽ chiếm toàn bộ chiều rộng */
            .card {
                width: 100%;
            }

        }

        /* Container */
        .container {
            position: relative;
        }

        /* Position toggle buttons */
        .open-btn,
        .close-btn {
            position: absolute;
            top: -45px;
            left: -30px;
            z-index: 1;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/user">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
                </a>

                <!-- Toggler for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><b class="nav-link active" href="/user">Home</b></li>
                        @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recogintion</a>
                        @else
                            <a class="nav-link" href="#">Nhận diện kiến trúc (Chưa đăng nhập)</a>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Architectures</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <b href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->fullname }}</b>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Thông tin của tôi</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Kết quả</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
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

            <!-- Main Content Section -->
            <div class="container mt-4">
                <h3>Phong cách kiến trúc</h3>
                <div class="row">
                    @foreach($architectures as $architecture)
                        <div class="col-md-4">
                            <div class="card"
                                onclick="window.location='{{ route('architecture.detail', $architecture->id) }}'">
                                <img src="{{ asset('storage/' . $architecture->image_url) }}" class="card-img-top"
                                    alt="{{ $architecture->name }}">
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
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2025 Tất cả quyền được bảo vệ. Trang web của bạn.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mặc định sidebar đóng và hiển thị nút "open"
        let sidebarOpen = false;

        // Mở sidebar khi click vào nút "open"
        document.getElementById('open-btn').addEventListener('click', function () {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0'; // Mở sidebar
            document.getElementById('main-content').style.marginLeft = '250px'; // Dịch chuyển nội dung
            document.getElementById('open-btn').style.display = 'none'; // Ẩn nút "open"
            document.getElementById('close-btn').style.display = 'block'; // Hiển thị nút "close"
        });

        // Đóng sidebar khi click vào nút "close"
        document.getElementById('close-btn').addEventListener('click', function () {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px'; // Đóng sidebar
            document.getElementById('main-content').style.marginLeft = '0'; // Trả lại margin cho nội dung
            document.getElementById('open-btn').style.display = 'block'; // Hiển thị nút "open"
            document.getElementById('close-btn').style.display = 'none'; // Ẩn nút "close"
        });
    </script>
</body>

</html>
