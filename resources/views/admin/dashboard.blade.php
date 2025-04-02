<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Đảm bảo body có đủ chiều cao */
        }

        /* Header */
        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            position: relative;
        }

        .header h1 {
            text-align: center;
        }

        /* Hamburger button fixed in header */
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background-color: #1f2a3f;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 95px; /* Dịch xuống dưới header */
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #333;
            color: white;
            padding-top: 20px;
            overflow-y: auto; /* Thêm khả năng cuộn cho sidebar khi nội dung quá dài */
            z-index: 999;
            transition: width 0.3s ease, opacity 0.3s ease; /* Thêm hiệu ứng khi thu gọn sidebar */
        }

        .sidebar a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
            margin-left: 250px; /* Thêm margin-left để phần nội dung không bị che khuất bởi sidebar */
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .card {
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            background-color: #1f2a3f;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }

        /* Toggle buttons */
        .close-btn {
            display: none;
        }

        .open-btn {
            display: block;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <!-- Hamburger button fixed in header -->
        <button class="toggle-btn open-btn" id="open-btn">
            <i class="fas fa-bars"></i> Open Sidebar
        </button>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Navigation</h3>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
        <a href="#">Reports</a>
        <a href="#">Logout</a>
    </div>

    <!-- Toggle Buttons -->
    <button class="toggle-btn close-btn" id="close-btn">
        <i class="fas fa-times"></i> Close Sidebar
    </button>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <h2>Welcome to Admin Dashboard</h2>

        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        Total Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">1200</h5>
                        <p class="card-text">Total registered users on the platform.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        Active Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">800</h5>
                        <p class="card-text">Users currently active on the platform.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">
                        Inactive Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">400</h5>
                        <p class="card-text">Users who have not logged in recently.</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>News & Recommendations</h3>
        <div class="row">
            <!-- News 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="images/Baroque.jpg" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">Half-Life 2 RTX</h5>
                        <p class="card-text">Exciting news about the new Half-Life 2 RTX game update!</p>
                    </div>
                </div>
            </div>

            <!-- News 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="images/ArtNouveau.jpg" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">NVIDIA DLSS Announcement</h5>
                        <p class="card-text">Learn more about the latest NVIDIA DLSS technology and updates.</p>
                    </div>
                </div>
            </div>

            <!-- News 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="images/Gothic.jpg" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">New Technology</h5>
                        <p class="card-text">Learn more about the latest technology trends.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© 2025 Admin Dashboard</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar visibility
        let sidebarOpen = false; // Biến theo dõi trạng thái của sidebar

        document.getElementById('open-btn').addEventListener('click', function() {
            sidebarOpen = true; // Đánh dấu sidebar là mở
            document.getElementById('sidebar').style.width = '250px'; // Mở rộng sidebar
            document.getElementById('main-content').style.marginLeft = '250px'; // Dịch chuyển nội dung
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            sidebarOpen = false; // Đánh dấu sidebar là đóng
            document.getElementById('sidebar').style.width = '0'; // Thu gọn sidebar
            document.getElementById('main-content').style.marginLeft = '0'; // Trả lại margin cho nội dung
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });

        // Khi cuộn trang xuống, sidebar tự động thu lại
        window.addEventListener('scroll', function() {
            var sidebar = document.getElementById('sidebar');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 50 && sidebarOpen) { // Chỉ thu gọn khi sidebar đang mở
                sidebar.style.width = '60px'; // Thu gọn sidebar
                sidebar.style.opacity = '0.8'; // Giảm độ mờ của sidebar khi thu gọn
            } else if (scrollPosition <= 50 && sidebarOpen) { // Khi cuộn lên và sidebar mở
                sidebar.style.width = '250px'; // Mở rộng lại sidebar
                sidebar.style.opacity = '1'; // Phục hồi độ mờ
            }
        });
    </script>
</body>
</html>
