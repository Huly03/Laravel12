<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .login-container {
      max-width: 400px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-title {
      font-size: 28px;
      font-weight: bold;
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
    .text-link {
      color: #007bff;
      text-decoration: none;
    }
    .text-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="login-container">
      <h2 class="text-center login-title mb-4">Đăng nhập hệ thống</h2>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="username" class="form-label">Tên đăng nhập</label>
          <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-custom w-100">Đăng nhập</button>
      </form>

      <!-- Nút chuyển hướng sang trang đăng ký -->
      <div class="text-center mt-3">
        <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}" class="text-link">Đăng ký</a></p>
      </div>
    </div>
  </div>
</body>
</html>
