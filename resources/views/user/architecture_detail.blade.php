<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>Chi tiết phong cách kiến trúc {{ $architecture->name }}</title>

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
}

.main-content {
    padding: 30px;
    background-color: ghostwhite;
    transition: margin-left 0.3s ease;
    width: 100%; /* Chiều ngang toàn màn hình */
    display: flex; /* Dùng flex để căn giữa nội dung bên trong */
    justify-content: center; /* Căn giữa theo chiều ngang */
}

.header {
    background-color: ghostwhite;
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
    background-color: ghostwhite;
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
    color: navy;
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

.sidebar {
    position: fixed;
    top: 100px;
    left: -250px;
    width: 250px;
    min-height: 100%;
    background-color: whitesmoke;
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
    background-color: whitesmoke;
    transition: background-color 0.3s ease;
}

.sidebar a:hover {
    background-color: navy;
    color: white;
}

.toggle-btn {
    background-color: ghostwhite;
    color: navy;
    padding: 10px;
    border: none;
    cursor: pointer;
}

.open-btn, .close-btn {
    position: absolute;
    top: -50px;
    left: -30px;
    z-index: 1;
}

.container {
    margin-top: 40px;
    background-color: ghostwhite;
    border-radius: 8px;
    padding: 30px;
    position: relative;
    max-width: 100%; /* Giới hạn chiều ngang của nội dung */
    width: 80%; /* Đảm bảo container không vượt quá max-width */
}

h2 {
    text-align: center;
    font-size: 36px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

.img-fluid {
    display: block;
    width: 60%; /* Đảm bảo ảnh tự động điều chỉnh theo container */
    max-width: 100%; /* Giữ kích thước ảnh phù hợp với container */
    height: auto;
    margin: 20px auto;
    object-fit: cover;
}

h4 {
    font-size: 24px;
    margin-top: 30px;
    margin-bottom: 15px;
    font-weight: 500;
    color: #333;
}

.description, h4 {
    width: 60%; /* Giới hạn chiều ngang */
    font-size: 16px;
    color: #444;
    line-height: 1.8;
    margin: 0 auto 20px; /* Căn giữa và giữ khoảng cách dưới */
}

.blog-content {
    width: 60%; /* Giới hạn chiều ngang */
    font-size: 16px;
    color: #444;
    line-height: 1.8;
    margin: 20px auto; /* Căn giữa và giữ khoảng cách trên */
    padding: 20px;
    background-color: ghostwhite;
    border-radius: 8px;
    border-left: 4px solid #1E3A8A;
}

.blog-content p {
    margin: 0 0 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .img-fluid {
        max-width: 100%;
    }

    h2 {
        font-size: 28px;
    }

    h4 {
        font-size: 20px;
    }

    .description, .blog-content {
        font-size: 14px;
    }
}
    </style>
</head>
<body>

<!-- Header + Navbar -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/user">
                @if(!empty($config->logo))
                    <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="height: 80px;">
                @endif            
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/user">Home</a></li>
                    @if(session('user_id'))
                        <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recognition</a>
                    @else
                        <a class="nav-link" href="#">Recognition (login)</a>
                    @endif
                    <li class="nav-item"><a class="nav-link active" href="/user/architectures/view">Architectures</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="sidebar" id="sidebar">
    <h3 class="text-center">
        <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
            <i class="fas fa-user-circle text-center"></i> {{ Auth::user()->username }}
        </a>
    </h3>
    <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
    <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Result</a>        
    <a href="/login">
        <i class="fas fa-sign-out-alt"></i> Logout
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
        <div class="description">{{ $architecture->description }}</div>

        <h4>Thông tin chi tiết về phong cách kiến trúc</h4>
        <div class="blog-content">
            @if($textContent)
                @foreach(explode("\n", $textContent) as $paragraph)
                    <p>{{ trim($paragraph) }}</p>
                @endforeach
            @else
                <p>Không có thông tin chi tiết từ tệp.</p>
            @endif
        </div>
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