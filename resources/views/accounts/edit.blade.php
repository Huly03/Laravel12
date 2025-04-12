<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header Styling */
        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        /* Logo in the header */
        .header img {
            height: 60px;
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
            font-weight: 600;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
            border-radius: 5px;
        }

        /* Form Styling */
        .container {
            max-width: 800px;
            margin-top: 40px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #1f2a3f;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #15466e;
        }

        .alert-success {
            margin-top: 20px;
        }

    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/admin">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/upload">Nhận diện kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/architecture">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/project">Dự án</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Main content -->
<div class="container">
    <h2>Chỉnh Sửa Tài Khoản: {{ $account->username }}</h2>

    <!-- Display success message if there is one -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Edit form -->
    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- HTTP method spoofing for PUT request -->

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $account->username) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $account->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $account->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="1" {{ $account->gender == 1 ? 'selected' : '' }}>Nam</option>
                <option value="0" {{ $account->gender == 0 ? 'selected' : '' }}Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập Nhật Tài Khoản</button>
        </div>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
