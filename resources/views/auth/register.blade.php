<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="text-center mb-4">Đăng ký tài khoản</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('register.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="fullname" class="form-label">Họ và tên</label>
      <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required>
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Tên đăng nhập</label>
      <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label for="sdt" class="form-label">Số điện thoại</label>
      <input type="text" class="form-control" name="sdt" value="{{ old('sdt') }}">
    </div>

    <div class="mb-3">
      <label for="dia_chi" class="form-label">Địa chỉ</label>
      <textarea class="form-control" name="dia_chi" rows="2">{{ old('dia_chi') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" name="password" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
      <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <!-- Nếu bạn muốn chọn level -->
    {{-- 
    <div class="mb-3">
      <label for="level" class="form-label">Cấp độ</label>
      <select class="form-control" name="level" required>
        <option value="2">Người dùng</option>
        <option value="1">Quản trị viên</option>
      </select>
    </div>
    --}}
    <input type="hidden" name="level" value="2">

    <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
  </form>
</div>
</body>
</html>
