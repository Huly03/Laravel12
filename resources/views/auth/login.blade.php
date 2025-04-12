<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="text-center mb-4">Đăng nhập hệ thống</h2>

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

    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
  </form>
</div>
</body>
</html>
