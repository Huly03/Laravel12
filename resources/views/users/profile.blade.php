<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="{{ $config->description }}">
  <meta name="keywords" content="{{ $config->keywords  }}">
  <title>Danh sách các dự án</title>

  @if(!empty($config->favicon))
    <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
  @endif

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f7fb;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .main-content {
      padding: 40px 20px;
      background-color: #f4f7fb;
      margin-left: 0;
      transition: margin-left 0.3s ease;
      flex: 1;
    }

    .card {
      padding: 30px;
      border-radius: 15px;
      background-color: #ffffff;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      border: none;
    }

    .card h2 {
      font-size: 28px;
      color: #1E3A8A;
      font-weight: 600;
    }

    .form-label {
      font-weight: 600;
      color: #1E3A8A;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #d1d1d1;
      padding: 10px 14px;
      font-size: 15px;
      transition: border-color 0.3s;
    }

    .form-control:focus {
      border-color: #1E3A8A;
      box-shadow: 0 0 0 2px rgba(30, 58, 138, 0.2);
    }

    .btn-primary {
      background-color: #1E3A8A;
      border-color: #1E3A8A;
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 16px;
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #143061;
      border-color: #143061;
    }

    .alert-success {
      font-weight: 600;
      background-color: #e6f4ea;
      color: #2e7d32;
      border-left: 5px solid #2e7d32;
    }


    /* Header styling */
    .header {
      background-color: ghostwhite;
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

    /* Sidebar styling */
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

    /* Sidebar toggle buttons */
    .toggle-btn {
      background-color: ghostwhite;
      color: navy;
      padding: 10px;
      border: none;
      cursor: pointer;

    }

    .container {
      max-width: 960px;
      width: 100%;
      margin: 0 auto;
      padding: 40px 20px;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>

<body>
  <!-- Header -->
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
            <li class="nav-item"><a class="nav-link active" href="/user">Home</a></li>
            @if(session('user_id'))
        <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recogintion</a>
      @else
    <a class="nav-link" href="#">Recogintion (login)</a>
  @endif


            <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Architectures</a></li>
            <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>

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
    <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
    <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Result</a>
    <a href="/login">
      <i class="fas fa-sign-out-alt"></i> Logout
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
        <h2 class="text-center mb-4">Profile</h2>

        @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

        <form method="POST" action="{{ route('my.account.update') }}">
          @csrf

          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control"
              value="{{ old('fullname', $user->fullname) }}">
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Usename</label>
            <input type="text" name="username" id="username" class="form-control"
              value="{{ old('username', $user->username) }}" readonly>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->sdt) }}">
          </div>

          <div class="mb-3">
            <label for="dia_chi" class="form-label">Address</label>
            <input type="text" name="dia_chi" id="dia_chi" class="form-control"
              value="{{ old('dia_chi', $user->dia_chi) }}">
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
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