<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Header styling */
        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px; /* Điều chỉnh chiều cao header */
        }

        /* Logo in the header */
        .header img {
            height: 100%; /* Làm cho chiều cao ảnh bằng chiều cao của header */
            width: auto; /* Đảm bảo tỷ lệ khung hình của ảnh không bị méo */
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
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
        }

        /* Styling for the search form */
        .navbar .form-inline {
            display: flex;
            align-items: center;
            position: relative; /* Để nút tìm kiếm có thể được căn chỉnh phía trên bên phải textbox */
        }

        /* Styling the input box */
        .navbar .form-inline input[type="text"] {
            width: 200px;
            padding: 10px 10px 10px 30px; /* Add padding for the text inside */
            border-radius: 20px;
            border: 1px solid #ccc;
            margin-left: 10px;
            position: relative;
        }

        /* Icon positioned at the top-right of the textbox */
        .navbar .form-inline button {
            position: absolute;
            top: 5px; /* Căn trên */
            right: 5px; /* Căn phải */
            background-color: transparent;
            border: none;
            color: #ccc; /* Icon color */
            font-size: 18px;
            cursor: pointer;
        }

        .navbar .form-inline button:hover {
            color: #1abc9c;
        }

        /* Optional: Add some space between the search form and the other navbar items */
        .navbar .form-inline {
            margin-left: auto; /* Align search form to the right */
        }

        /* Add CSS for displaying user ID at the top-right corner */
        .user-id {
            position: absolute;
            top: 15px;
            right: 20px;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar with Logo as brand name -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <!-- Logo placed as navbar brand -->
    <a class="navbar-brand" href="/admin">
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/admin">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/upload">Nhận diện kiến trúc</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/architecture">Phong cách kiến trúc</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/project">Dự án</a>
        </li>
        

        <!-- Search Form -->
        <li class="nav-item">
          <form class="form-inline d-inline" id="searchForm">
            <input type="text" id="searchInput"  placeholder="Tìm kiếm...">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- User ID Display -->
<!-- <div class="user-id">
    @if(Session::has('user_id'))
        User ID: {{ Session::get('user_id') }}
    @else
        User ID: Not Logged In
    @endif
</div> -->

<!-- Bootstrap JS bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Xử lý sự kiện tìm kiếm
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();  // Ngừng hành động mặc định của form (submit)

        var query = $('#searchInput').val();  // Lấy giá trị từ thanh tìm kiếm

        // Kiểm tra nếu từ khóa tìm kiếm không rỗng
        if (query.trim() !== "") {
            console.log("Sending query:", query);  // Log dữ liệu gửi đi
            $.ajax({
                url: 'http://127.0.0.1:5000/search',  // Địa chỉ API của Laravel (gọi Flask API)
                method: 'POST',
                contentType: 'application/json',  // Đảm bảo gửi đúng kiểu dữ liệu JSON
                data: JSON.stringify({ query: query }),  // Chuyển dữ liệu thành JSON
                success: function(response) {
                    console.log("Response from Flask API:", response);  // Log phản hồi từ Flask
                    if (response.matched_articles && response.matched_articles.length > 0) {
                        // Xử lý kết quả trả về từ API
                        console.log(response.matched_articles);
                    } else {
                        console.log('Không tìm thấy bài báo nào');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending request to Flask:', error);  // Log lỗi nếu có
                    alert('Đã có lỗi xảy ra khi tìm kiếm: ' + error);
                }
            });
        } else {
            alert("Vui lòng nhập từ khóa tìm kiếm");
        }
    });
</script>

</body>
</html>
