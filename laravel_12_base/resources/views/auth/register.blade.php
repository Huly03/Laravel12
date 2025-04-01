<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f1f1f1;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background: linear-gradient(135deg, #eee8aa, #daa520);
        border-radius: 12px;
        padding: 15px 20px;  /* Giảm padding của container */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        color: white;
    }

    h2 {
        text-align: center;
        font-size: 22px;  /* Giảm font-size của tiêu đề */
        margin-bottom: 10px;
        font-weight: 700;
    }

    .form-control {
        border-radius: 8px;
        padding: 8px;  /* Giảm padding của input */
        margin-bottom: 12px;  /* Giảm margin giữa các input */
        font-size: 14px;  /* Giảm font-size */
        border: none;
    }

    .form-control:focus {
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        border-color: #007bff;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;  /* Giảm padding của button */
        border-radius: 8px;
        background-color: #f0e68c;
        border: none;
        font-size: 14px;  /* Giảm font-size của button */
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    label {
        font-weight: 600;
        color: #fff;
        font-size: 12px;  /* Giảm font-size của label */
        margin-bottom: 5px;
        display: block;
    }

    select.form-select {
        border-radius: 8px;
        padding: 8px;  /* Giảm padding của select */
        font-size: 14px;  /* Giảm font-size */
    }

    .d-grid {
        margin-top: 15px;  /* Giảm margin-top */
    }

    /* Mobile responsiveness */
    @media (max-width: 576px) {
        .container {
            padding: 15px;
        }

        h2 {
            font-size: 20px;
        }
    }
</style>


</head>
<body>

<div class="container">
    <h2>Đăng ký thành viên</h2>
    <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
        <div class="mb-3">
            <label for="Username">Tên tài khoản:</label>
            <input id="Username" type="text" name="Username" class="form-control" placeholder="Nhập tên tài khoản">
        </div>

        <div class="mb-3">
            <label for="Password">Mật khẩu:</label>
            <input id="Password" type="password" name="Password" class="form-control" placeholder="Nhập mật khẩu">
        </div>

        <div class="mb-3">
            <label for="pwd2">Xác nhận mật khẩu:</label>
            <input id="pwd2" type="password" name="pwd2" class="form-control" placeholder="Xác nhận mật khẩu">
        </div>

        <div class="mb-3">
            <label for="GioiTinh">Giới tính:</label>
            <div>
                <div class="form-check form-check-inline">
                    <input id="rMale" type="radio" name="GioiTinh" value="0" class="form-check-input">
                    <label for="rMale" class="form-check-label">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="rFemale" type="radio" name="GioiTinh" value="1" class="form-check-input">
                    <label for="rFemale" class="form-check-label">Nữ</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="SDT">Số điện thoại:</label>
            <input id="SDT" type="number" name="SDT" class="form-control" placeholder="Nhập số điện thoại">
        </div>

        <div class="mb-3">
            <label for="Email">Email:</label>
            <input id="Email" type="email" name="Email" class="form-control" placeholder="Nhập email">
        </div>

        <div class="mb-3">
            <label for="Ngaysinh">Ngày sinh:</label>
            <input type="date" id="txtBirth" name="Ngaysinh" class="form-control">
        </div>

        <div class="mb-3">
            <label for="Diachi">Nơi sinh sống:</label>
            <select class="form-select" id="Diachi" name="Diachi" required>
                <option selected value="">Chọn tỉnh</option>
                <option value="ct">Can Tho</option>
                <option value="cm">Ca Mau</option>
                <option value="hg">An Giang</option>
                <option value="st">Soc Trang</option>
            </select>
        </div>

        <div class="d-grid">
            <input type="submit" name="btnRegister" value="Đăng ký" class="btn btn-primary">
        </div>
    </form>
</div>

</body>
</html>
