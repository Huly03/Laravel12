<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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

        /* Sidebar */
        /* Sidebar */
/* Sidebar */
.sidebar {
    position: fixed;
    top: 95px; /* Dịch xuống dưới header */
    left: -250px; /* Sidebar ẩn khi mới tải trang */
    width: 250px;
    min-height: 100%; /* Đảm bảo sidebar kéo dài tới footer */
    background-color: #f5f5dc; /* Nền be cho sidebar */
    color: black; /* Màu chữ đen */
    padding-top: 20px;
    overflow-y: auto; /* Thêm khả năng cuộn cho sidebar khi nội dung quá dài */
    z-index: 0;
    transition: left 0.3s ease; /* Thêm hiệu ứng khi mở/đóng sidebar */
}

/* Các liên kết trong sidebar */
.sidebar a {
    color: black; /* Màu chữ đen cho các liên kết */
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background-color: #f5f5dc; /* Nền be cho liên kết */
    transition: background-color 0.3s ease; /* Thêm hiệu ứng khi hover */
}

/* Màu nền khi hover lên các liên kết */
.sidebar a:hover {
    background-color: #d4e157; /* Màu nền khi hover (xanh sáng) */
    color: white; /* Màu chữ trắng khi hover */
}

        /* Main Content */
        .main-content {
            padding: 30px;
            margin-left: 0; /* Không margin trái khi sidebar ẩn */
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .card {
            margin-bottom: 20px;
        }



        /* Toggle buttons */
        .close-btn {
            display: none;
        }

        .open-btn {
            display: block;
        }
        /* Style cho nút dấu ba chấm */
.dropdown-toggle::after {
    display: none;  /* Ẩn mũi tên dropdown mặc định */
}

.dropdown-menu {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 999;
}

/* Style hover cho các lựa chọn dropdown */
.dropdown-item:hover {
    background-color: #f0f0f0;
}

    </style>
</head>
<body>
<div>
    <!-- Gọi Component Header của Laravel -->
    <x-header />

    <!-- Hamburger button fixed in header -->
    <button class="toggle-btn open-btn" id="open-btn">
        <i class="fas fa-bars"></i>
    </button>
    <button class="toggle-btn close-btn" id="close-btn">
        <i class="fas fa-times"></i>
    </button>
</div>
    

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Architecture</h3>
        <a href="#">Home</a>
        <a href="/accounts">Users</a>
        <a href="#">Settings</a>
        <a href="#">Reports</a>
        <a href="/login">Logout</a>
    </div>

    <!-- Toggle Buttons -->
    

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <h2>Danh sách dự án</h2>

        <div class="row">
            <!-- Tổng các dự án -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        Tổng các dự án
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalProjects }}</h5>
                        <p class="card-text">Các dự án đã và đang hoàn thành</p>
                    </div>
                </div>
            </div>

            <!-- Dự án đã hoàn thành -->
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        Đã hoàn thành
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $completedProjects }}</h5>
                        <p class="card-text">Các dự án đã được hoàn thành</p>
                    </div>
                </div>
            </div>

            <!-- Dự án đang thi công -->
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">
                        Đang thi công
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $inProgressProjects }}</h5>
                        <p class="card-text">Các dự án đang được thi công</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-4">
        <h3>Phong cách kiến trúc</h3>
<div class="row">
    @foreach($architectures as $architecture)
        <div class="col-md-4">
            <div class="card" onclick="window.location='{{ route('architecture.show', $architecture->id) }}'">
                <img src="{{ asset('storage/' . $architecture->image_url) }}" class="card-img-top" alt="{{ $architecture->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $architecture->name }}</h5>
                    <p class="card-text">{{ $architecture->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

    
<div class="main-content" id="main-content">
    <h2>Danh sách dự án</h2>
    <div class="row">
        @foreach($projects as $project)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $project->image_url) }}" class="card-img-top" alt="{{ $project->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text"><strong>Loại dự án:</strong> {{ $project->project_type }}</p>
                        <p class="card-text"><strong>Trạng thái:</strong> {{ $project->status }}</p>
                        <p class="card-text"><strong>Giá:</strong> {{ number_format($project->price, 2) }} VNĐ</p>
                        
                        <!-- Dropdown button -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i> <!-- Icon 3 chấm -->
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Chỉnh sửa dự án -->
                                <li><a class="dropdown-item" href="{{ route('project.edit', $project->id) }}">Chỉnh sửa</a></li>
                                
                                <!-- Xóa dự án -->
                                <li>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE') <!-- Chỉ định phương thức DELETE -->
                                        <button type="submit" class="dropdown-item btn btn-danger">Xóa</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
</div>
    <x-footer/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar visibility
        let sidebarOpen = false; // Biến theo dõi trạng thái của sidebar

        document.getElementById('open-btn').addEventListener('click', function() {
            sidebarOpen = true; // Đánh dấu sidebar là mở
            document.getElementById('sidebar').style.left = '0'; // Mở sidebar
            document.getElementById('main-content').style.marginLeft = '250px'; // Dịch chuyển nội dung
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            sidebarOpen = false; // Đánh dấu sidebar là đóng
            document.getElementById('sidebar').style.left = '-250px'; // Ẩn sidebar
            document.getElementById('main-content').style.marginLeft = '0'; // Trả lại margin cho nội dung
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });
    </script>
</body>
</html>
