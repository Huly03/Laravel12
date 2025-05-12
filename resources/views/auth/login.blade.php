<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in | ArchStyAI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  
  <style>
    :root {
      --primary-color: #3a5a78;
      --primary-hover: #2c4761;
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
    
    .login-container {
      max-width: 450px;
      width: 100%;
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    
    .login-container:hover {
      transform: translateY(-5px);
    }
    
    .login-header {
      background: var(--primary-color);
      color: white;
      padding: 25px;
      text-align: center;
      position: relative;
    }
    
    .login-header h2 {
      margin: 0;
      font-weight: 600;
    }
    
    .login-header::after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 30px;
      height: 30px;
      background: var(--primary-color);
      rotate: 45deg;
      z-index: 1;
    }
    
    .login-body {
      padding: 30px;
      position: relative;
      z-index: 2;
    }
    
    .form-control {
      border-radius: 8px;
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
      border-radius: 8px 0 0 8px !important;
    }
    
    .btn-login {
      background-color: var(--primary-color);
      border: none;
      padding: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      border-radius: 8px;
      transition: all 0.3s;
    }
    
    .btn-login:hover {
      background-color: var(--primary-hover);
      transform: translateY(-2px);
    }
    
    .password-container {
      position: relative;
    }
    
    .password-toggle {
      cursor: pointer;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #777;
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
    
    .login-footer {
      text-align: center;
      padding: 20px;
      background-color: var(--secondary-color);
      border-top: 1px solid #eee;
    }
    
    .login-footer a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
    }
    
    @media (max-width: 576px) {
      .login-container {
        border-radius: 0;
        box-shadow: none;
      }
      
      body {
        background: white;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="login-header">
        <h2><i class="fas fa-sign-in-alt me-2"></i>Log in to the system</h2>
      </div>
      
      <div class="login-body">
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        
        <form action="{{ route('login.store') }}" method="POST">
          @csrf
          
          <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" name="username" class="form-control" required value="{{ old('username') }}" placeholder="Nhập tên đăng nhập">
            </div>
          </div>
          
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="password-container">
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu">
              </div>
              <span class="password-toggle" onclick="togglePassword(this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
            <div class="text-end mt-2">
              <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--primary-color); font-size: 14px;">Forgot Password?</a>
            </div>
          </div>
          
          <div class="d-grid gap-2 mb-4">
            <button type="submit" class="btn btn-login">
              <i class="fas fa-sign-in-alt me-2"></i>Log in
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
      
      <div class="login-footer">
Don't have an account? <a href="{{ route('register') }}">Sign up now</a>      </div>
    </div>
  </div>

  <script>
    function togglePassword(element) {
      const input = element.closest('.password-container').querySelector('input');
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
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>