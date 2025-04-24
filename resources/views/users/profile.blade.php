<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Cập nhật tài khoản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
    }
    .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }
    .card {
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card h2 {
      font-size: 28px;
      color: #007bff;
    }
    .form-label {
      font-weight: bold;
      color: #333;
    }
    .form-control {
      border-radius: 10px;
      box-shadow: none;
      border: 1px solid #ccc;
    }
    .btn-custom {
      border-radius: 10px;
      padding: 12px;
      font-size: 16px;
    }
    .alert-success {
      font-weight: bold;
    }
    .container {
            position: relative;
            /* To position toggle buttons within it */
        }

        /* Position toggle buttons */
        .open-btn,
        .close-btn {
            position: absolute;
            top: -65px;
            left: -30px;
            z-index: 1;
            /* Ensure the button is above content */
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
            left: -250px;
            /* Sidebar hidden by default */
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
            <!-- Hiển thị username của người dùng đã đăng nhập -->
            <b href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->fullname }}</b>
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
  <div class="card shadow-sm">
    <h2 class="text-center mb-4">Cập nhật tài khoản</h2>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('my.account.update') }}">
      @csrf

      <div class="mb-3">
        <label for="fullname" class="form-label">Họ tên</label>
        <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname', $user->fullname) }}">
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" readonly>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->sdt) }}">
      </div>

      <div class="mb-3">
        <label for="dia_chi" class="form-label">Địa chỉ</label>
        <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="{{ old('dia_chi', $user->dia_chi) }}">
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">Cập nhật</button>
      </div>
    </form>
  </div>
</div>
</div>
<x-footer />

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
