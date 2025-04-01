<!DOCTYPE html>
  <html lang="vi">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Trang Chủ</title>
      <!-- Thêm các liên kết đến CSS hoặc các tệp khác nếu cần -->
  </head>
  <body>
      <header>
          <nav>
              <ul>
                  <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                  <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                  <li><a href="{{ route('register') }}">Đăng Ký</a></li>
                  <!-- Thêm các liên kết khác nếu cần -->
              </ul>
          </nav>
      </header>
      <main>
          <h1>Chào mừng đến với trang chủ!</h1>
          <p>Đây là trang chủ của ứng dụng Laravel của bạn.</p>
      </main>
      <footer>
          <p>&copy; {{ date('Y') }} Ứng dụng Laravel</p>
      </footer>
  </body>
  </html>
