<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <style>
        h2{
            text-align: center;
            margin: 20px;
            color: #fff;
            font-size: 50px;
        }

        body{
            background-image: url(https://wallpapers.com/images/high/classical-roman-architectural-marvel-uji0itimzmvbbybt.webp); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Đảm bảo chiều cao của body đủ với màn hình */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            padding: 0;
            margin-top: 0; /* Xóa margin-top để tránh đẩy lên trên */
            max-width: 500px;
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form id="formreg" class="formreg" method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="row mb-3 my-auto">
                <div class="d-grid col-8 mx-auto">
                    <input id="Username" type="text" name="Username" class="form-control" placeholder="Tên tài khoản" value="{{ old('Username') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="d-grid col-8 mx-auto">
                    <input id="Password" type="password" name="Password" class="form-control" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="row col-10 mb-3 mx-auto">
                <div class="col-5 d-grid mx-auto">
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-rounded-pill">Đăng nhập</button>
                </div>
                <div class="col-5 d-grid mx-auto">
                    <button type="button" name="btnRegister" class="btn btn-primary btn-rounded-pill" onclick="location.href='{{ url('register') }}';">
                        Đăng ký
                    </button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </div>
</body>
</html>
