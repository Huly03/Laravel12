<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords  }}">
    <title>{{ $config->website_name}}</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: ghostwhite;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: flex-start;
            /* Ensure the header stays at the top */
        }

        /* Header styling */
        .header {
            background-color: ghostwhite;
            padding: 20px 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            margin-top: 20px;
            /* Some space from the top */
        }

        /* Logo styling */
        .header .logo {
            height: 60px;
            /* Adjust the height of the logo */
            margin-bottom: 10px;
            /* Reduced spacing between logo and navbar */
        }

        /* Navbar styling */
        .navbar {
            background-color: ghostwhite;
            width: 100%;
            margin-bottom: 0;
            /* Remove margin from bottom of the navbar */
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
            color: navy;
        }

        /* Archive button styling */
        .navbar .navbar-nav .nav-link.archive-btn {
            color: #1E3A8A;
            /* Navy Blue */
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

        /* Ensure the header content (logo + navbar) are centered both vertically and horizontally */
        .header-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Centers the content vertically */
            align-items: center;
            /* Centers the logo and navbar horizontally */
            text-align: center;
        }

        /* Add space between the logo and navbar */
        .navbar-wrapper {
            margin-top: 20px;
            /* Space between the logo and navbar */
        }

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px;
            width: 250px;
            min-height: 100%;
            background-color: whitesmoke;
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            transition: left 0.3s ease;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: whitesmoke;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: navy;
            color: white;
        }

        /* Sidebar toggle buttons */
        .toggle-btn {
            background-color: ghostwhite;
            color: navy;
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
                left: -250px;
                /* Sidebar đóng */
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
            top: -300px;
            left: -30px;
            z-index: 1;
        }

        .intro-section {
            margin-bottom: 135px;
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
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <a class="navbar-brand" href="/user">
                @if(!empty($config->logo))
                    <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="height: 200px;">
                @endif

            </a>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <!-- Toggler for small screens -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="/user">Home</a></li>
                            @if(session('user_id'))
                                <a class="nav-link"
                                    href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recogintion</a>
                            @else
                                <a class="nav-link" href="#">Recogintion (login)</a>
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
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->fullname }}</a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Results</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Logout
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
            <div class="intro-section">
                <h2>Welcome to Architectural Styles Recognition</h2>
                <p>Explore and discover various architectural styles from around the world. Our website offers tools to
                    recognize and understand the unique features of each style, along with a detailed exploration of
                    iconic architectures.</p>
                <a href="/login" class="btn btn-primary">Explore Now</a>
            </div>
            <!-- Main Content Section -->
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