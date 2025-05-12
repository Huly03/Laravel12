<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | ArchStyAI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  <style>
    :root {
      --primary-color: #3a5a78;
      --secondary-color: #f8f9fa;
      --accent-color: #5cb85c;
      --text-color: #333;
      --light-gray: #e9ecef;
    }
    
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    
    .auth-container {
      max-width: 600px;
      width: 100%;
      margin: 0 auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    
    .auth-header {
      background: var(--primary-color);
      color: white;
      padding: 25px;
      text-align: center;
    }
    
    .auth-header h2 {
      margin: 0;
      font-weight: 600;
    }
    
    .auth-body {
      padding: 30px;
    }
    
    .form-control {
      border-radius: 5px;
      padding: 12px 15px;
      border: 1px solid #ddd;
      transition: all 0.3s;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(58, 90, 120, 0.25);
    }
    
    .input-group-text {
      background-color: var(--light-gray);
      border-radius: 5px 0 0 5px !important;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border: none;
      padding: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      transition: all 0.3s;
    }
    
    .btn-primary:hover {
      background-color: #2c4761;
      transform: translateY(-2px);
    }
    
    .auth-footer {
      text-align: center;
      padding: 20px;
      background-color: var(--secondary-color);
      border-top: 1px solid #eee;
    }
    
    .auth-footer a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
    }
    
    .password-toggle {
      cursor: pointer;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #777;
    }
    
    .password-container {
      position: relative;
    }
    
    .divider {
      display: flex;
      align-items: center;
      margin: 20px 0;
    }
    
    .divider::before, .divider::after {
      content: "";
      flex: 1;
      border-bottom: 1px solid #ddd;
    }
    
    .divider-text {
      padding: 0 10px;
      color: #777;
      font-size: 14px;
    }
    
    .social-login {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }
    
    .social-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 18px;
      transition: all 0.3s;
    }
    
    .social-btn:hover {
      transform: translateY(-3px);
    }
    
    .facebook {
      background-color: #3b5998;
    }
    
    .google {
      background-color: #db4437;
    }
    
    .github {
      background-color: #333;
    }
    
    @media (max-width: 576px) {
      .auth-container {
        border-radius: 0;
      }
      
      body {
        background: white;
      }
    }
  </style>
</head>
<body>
<div class="container">
  <div class="auth-container">
    <div class="auth-header">
<h2><i class="fas fa-user-plus me-2"></i>Create an Account</h2>
<p class="mb-0 mt-2">Welcome to ArchStyAI</p>

    </div>
    
    <div class="auth-body">
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
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Nguyễn Văn A" required>
            </div>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
              <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username" required>
            </div>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="sdt" class="form-label">Phone</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
            <input type="text" class="form-control" name="sdt" value="{{ old('sdt') }}" placeholder="0987654321">
          </div>
        </div>
        
        <div class="mb-3">
          <label for="dia_chi" class="form-label">Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            <textarea class="form-control" name="dia_chi" rows="2" placeholder="Số nhà, đường, quận/huyện, tỉnh/thành phố">{{ old('dia_chi') }}</textarea>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <div class="password-container">
              <input type="password" class="form-control" name="password" placeholder="Ít nhất 8 ký tự" required>
              <span class="password-toggle" onclick="togglePassword(this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
          
          <div class="col-md-6 mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <div class="password-container">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
              <span class="password-toggle" onclick="togglePassword(this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
        </div>
        
        <input type="hidden" name="level" value="2">
        
        <div class="d-grid gap-2 mb-3">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-user-plus me-2"></i>Sign up
          </button>
        </div>
        
        <div class="divider">
          <span class="divider-text">OR</span>
        </div>
        
        <div class="social-login">
          <a href="#" class="social-btn facebook" title="Đăng nhập bằng Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-btn google" title="Đăng nhập bằng Google">
            <i class="fab fa-google"></i>
          </a>
          <a href="#" class="social-btn github" title="Đăng nhập bằng GitHub">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </form>
    </div>
    
<div class="auth-footer">
      Already have an account? <a href="/login">Log in now</a>
    </div>
  </div>
</div>

<script>
  function togglePassword(element) {
    const input = element.previousElementSibling;
    const icon = element.querySelector('i');
    
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
</body>
</html>