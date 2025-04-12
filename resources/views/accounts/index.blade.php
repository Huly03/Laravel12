<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
<div class="container mt-4">
    <h1 style="text-align:center; font-size: 2rem; font-weight: bold; margin-bottom: 20px; color: #333;">Quản lý Tài Khoản</h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #343a40; color: white;">
            <tr>
                <th style="padding: 10px; text-align: center;">Username</th>
                <th style="padding: 10px; text-align: center;">Email</th>
                <th style="padding: 10px; text-align: center;">Phone</th>
                <th style="padding: 10px; text-align: center;">Gender</th>
                <th style="padding: 10px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through accounts to display them -->
            @foreach($accounts as $account)
                <tr id="account-{{ $account->id }}" style="background-color: #f9f9f9; text-align: center;">
                    <td style="padding: 10px;">{{ $account->username }}</td>
                    <td style="padding: 10px;">{{ $account->email }}</td>
                    <td style="padding: 10px;">{{ $account->phone }}</td>
                    <td style="padding: 10px;">{{ $account->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                    <td style="padding: 10px;">
                        <!-- Edit button -->
                        <a href="{{ route('accounts.edit', $account) }}" style="text-decoration: none; padding: 8px 15px; background-color: #ffc107; color: white; border-radius: 5px; margin-right: 10px;">Chỉnh sửa</a>

                        <!-- Delete button -->
                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border-radius: 5px; border: none;" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
