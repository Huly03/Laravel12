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
        background: linear-gradient(135deg, #1f2a3f 0%, #34495e 100%);
        color: white;
        padding: 0;
        height: 80px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1000;
    }

    /* Logo in the header */
    .header img {
        height: 60px;
        width: auto;
        transition: all 0.3s ease;
    }

    .header img:hover {
        transform: scale(1.05);
    }

    /* Navbar styling */
    .navbar {
        background-color: #2c3e50;
        padding: 0.5rem 1rem;
    }

    .navbar .navbar-brand {
        color: white;
        padding: 0;
        font-weight: 600;
    }

    .navbar .navbar-nav .nav-link {
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        margin: 0 2px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .navbar .navbar-nav .nav-link:hover {
        background-color: #1abc9c;
        transform: translateY(-2px);
    }

    .navbar .navbar-nav .nav-link.active {
        background-color: #1abc9c;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

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
                    <li class="nav-item"><a class="nav-link" href="/architecture">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/project">Dự án</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

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
        document.addEventListener('DOMContentLoaded', function() {
        // Highlight menu item tương ứng với trang hiện tại
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>
<script>
    // Xử lý sự kiện tìm kiếm
    // $('#searchForm').on('submit', function(e) {
    //     e.preventDefault();  // Ngừng hành động mặc định của form (submit)

    //     var query = $('#searchInput').val();  // Lấy giá trị từ thanh tìm kiếm

    //     // Kiểm tra nếu từ khóa tìm kiếm không rỗng
    //     if (query.trim() !== "") {
    //         console.log("Sending query:", query);  // Log dữ liệu gửi đi
    //         $.ajax({
    //             url: 'http://127.0.0.1:5000/search',  // Địa chỉ API của Laravel (gọi Flask API)
    //             method: 'POST',
    //             contentType: 'application/json',  // Đảm bảo gửi đúng kiểu dữ liệu JSON
    //             data: JSON.stringify({ query: query }),  // Chuyển dữ liệu thành JSON
    //             success: function(response) {
    //                 console.log("Response from Flask API:", response);  // Log phản hồi từ Flask
    //                 if (response.matched_articles && response.matched_articles.length > 0) {
    //                     // Xử lý kết quả trả về từ API
    //                     console.log(response.matched_articles);
    //                 } else {
    //                     console.log('Không tìm thấy bài báo nào');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('Error sending request to Flask:', error);  // Log lỗi nếu có
    //                 alert('Đã có lỗi xảy ra khi tìm kiếm: ' + error);
    //             }
    //         });
    //     } else {
    //         alert("Vui lòng nhập từ khóa tìm kiếm");
    //     }
    // });
</script>

</body>
</html>
