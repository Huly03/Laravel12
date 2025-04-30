<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>{{ $config->website_name }}</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .carousel-item img {

            max-width: 50%;
            /* Giới hạn chiều rộng của ảnh */
            height: 500px;
            /* Chiều cao của ảnh */
            object-fit: cover;
            /* Đảm bảo ảnh được hiển thị đầy đủ */
            margin: 0 auto;
            /* Căn giữa ảnh nếu cần */
        }

        .carousel-caption {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            /* Căn giữa caption theo chiều ngang */
            width: 50%;
            /* Đảm bảo caption không vượt quá bề ngang ảnh */
            max-width: 100%;
            /* Giới hạn chiều rộng của caption */
            background-color: rgba(0, 0, 0, 0.5);
            /* Nền mờ để làm nổi bật caption */

            padding: 30px;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            text-align: center;
            /* Căn giữa văn bản trong caption */
        }

        .carousel-caption h5 {
            font-size: 2rem;
            /* Font chữ lớn hơn cho tên */
            font-weight: bold;
            /* Làm đậm cho tên */
            margin-bottom: 10px;
            /* Khoảng cách giữa tên và mô tả */
        }

        .carousel-caption p {
            font-size: 1rem;
            /* Font chữ nhỏ hơn cho mô tả */
        }




        .topbar {
            background-color: #1E3A8A;
            color: white;
            padding: 8px 20px;
            z-index: 1050;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .topbar .topbar-buttons .btn {
            border-radius: 6px;
            font-size: 14px;
            padding: 6px 14px;
        }

        .topbar .topbar-buttons .btn-outline-primary {
            border: 1px solid #ffffff;
            color: #ffffff;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .topbar .topbar-buttons .btn-outline-primary:hover {
            background-color: #ffffff;
            color: #1E3A8A;
        }

        .topbar .topbar-buttons .btn-primary {
            background-color: #ffffff;
            color: #1E3A8A;
            border: 1px solid #ffffff;
            transition: all 0.3s ease;
        }

        .topbar .topbar-buttons .btn-primary:hover {
            background-color: #cce0ff;
            border-color: #cce0ff;
            color: #143061;
        }

        .header {
            background-color: #ffffff;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            max-height: 150px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .navbar {
            background-color: #ffffff;
            width: 100%;
            margin-bottom: 0;
        }

        .navbar .navbar-nav .nav-item {
            padding-left: 20px;
            padding-right: 20px;
        }

        .navbar .navbar-nav .nav-link {
            color: black;

            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #1E3A8A;
        }

        .navbar .navbar-nav .nav-link.archive-btn {
            color: #1E3A8A;
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #1E3A8A;
            border-radius: 5px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .navbar .navbar-nav .nav-link.archive-btn:hover {
            background-color: #1E3A8A;
            color: white;
        }

        .main-content {
            padding: 50px;
            margin-top: 10px;
            /* to avoid overlap with topbar */
            flex: 1;
            background-color: #ffffff;
        }

        .intro-section {
            margin-bottom: 50px;
            /* Giảm khoảng cách dưới cùng */
            margin-top: 1px;
            /* Tăng khoảng cách phía trên nếu cần */
            text-align: center;
            padding: 30px;
            /* Điều chỉnh khoảng cách nội dung bên trong */
            background-color: #1E3A8A;
            color: white;
            border-radius: 8px;
        }


        .intro-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .intro-section p {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .intro-section .btn-primary {
            background-color: #ffffff;
            color: #1E3A8A;
            border: 1px solid #ffffff;
            transition: all 0.3s ease;
        }

        .intro-section .btn-primary:hover {
            background-color: #cce0ff;
            color: #143061;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
            border: none;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
        }

        .footer {
            background-color: #1E3A8A;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }

        /* Media Queries for responsiveness */
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

            .card {
                width: 100%;
            }

            .intro-section h2 {
                font-size: 30px;
            }

            .intro-section p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- Topbar -->
    <div class="topbar d-flex justify-content-end align-items-center px-4 py-2">
        <div class="topbar-buttons">
            <a href="/login" class="btn btn-outline-primary me-2"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="/register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</a>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="container">
            <a class="navbar-brand" href="/user">
                @if(!empty($config->logo))
                    <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" class="logo">
                @endif
            </a>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                            @if(session('user_id'))
                                <a class="nav-link"
                                    href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recognition</a>
                            @else
                                <a class="nav-link" href="#">Recognition (login)</a>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Architectures</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Introduction Section -->
            <div class="intro-section">
                <h2>Welcome to Architectural Styles Recognition</h2>
                <p>Explore and discover various architectural styles from around the world. Our website offers tools to
                    recognize and understand the unique features of each style, along with a detailed exploration of
                    iconic architectures.</p>
                <a href="/login" class="btn btn-primary">Explore Now</a>
            </div>

        </div>
    </div>
    <div class="container mt-4">
        <h1 class="text-center">Architectures</h1>

        <!-- Carousel -->
        <div id="architectureCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @foreach ($architectures as $index => $architecture)
                    <div class="carousel-item @if($index == 0) active @endif">
                        <!-- Hiển thị ảnh từ CSDL -->
                        <img src="{{ asset('storage/' . $architecture->image_url) }}" class="d-block w-100"
                            alt="{{ $architecture->name }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $architecture->name }}</h5>
                            <p>{{ $architecture->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Các nút điều khiển -->
            <button class="carousel-control-prev" type="button" data-bs-target="#architectureCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#architectureCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 All rights reserved. Your Architecture Recognition Website</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>