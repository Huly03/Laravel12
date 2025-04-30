<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>Danh sách các dự án</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content area styling */
        .main-content {
            padding: 30px;
            background-color: ghostwhite;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        /* Header styling */
        .header {
            background-color: ghostwhite;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        /* Logo in the header */
        .header img {
            height: 100%;
            width: auto;
        }

        /* Navbar styling */
        .navbar {
            background-color: ghostwhite;
            width: 100%;
            margin-bottom: 0;
        }

        .navbar .navbar-nav .nav-item {
            padding-left: 20px;
            padding-right: 20px;
        }

        .navbar .navbar-nav .nav-link {
            color: black;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: navy;
        }

        /* Archive button styling */
        .navbar .navbar-nav .nav-link.archive-btn {
            color: #1E3A8A;
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #1E3A8A;
            border-radius: 5px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .navbar .navbar-nav .nav-link.archive-btn:hover {
            background-color: #1E3 стихA8A;
            color: white;
        }

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 100px;
            left: -250px;
            width: 250px;
            min-height: 100%;
            background-color: whitesmoke;
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 0;
            transition: left 0.3s ease;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: whitesmoke;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: navy;
            color: white;
        }

        /* Sidebar toggle buttons */
        .toggle-btn {
            background-color: ghostwhite;
            color: navy;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .open-btn,
        .close-btn {
            position: absolute;
            top: -20px;
            left: -280px;
            z-index: 1;
        }

        .container {
            padding: 30px;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
        }

        .card {
            border: none;
            margin-bottom: 40px;
            background: ghostwhite;
        }

        .card-img-top {
            width: 100%;
            height: 400px; /* Giữ chiều cao cố định cho ảnh chính */
            object-fit: cover;
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
        }

        /* Gallery styling */
        .gallery {
            margin-top: 20px;
        }

        .gallery .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }

        .gallery .col-3 {
            flex: 0 0 23%;
            max-width: 23%;
            box-sizing: border-box;
            position: relative; /* Để chứa ảnh với tỷ lệ 1:1 */
        }

        .gallery .col-3 .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 100%; /* Tạo tỷ lệ 1:1 dựa trên chiều rộng */
        }

        .gallery .col-3 img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery .col-3 img:hover {
            transform: scale(1.05);
        }

        /* More overlay */
        .more-images {
            position: relative;
            cursor: pointer;
        }

        .more-images .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 100%; /* Tỷ lệ 1:1 */
        }

        .more-images img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .more-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .more-overlay:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            align-items: center;
            justify-content: center;
            z-index: 10000;
        }

        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #333;
        }

        .modal-content img {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 8px;
        }

        .modal .close {
            position: absolute;
            top: -40px;
            right: -40px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .modal .close:hover {
            color: #ccc;
        }

        .modal .nav-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .modal .prev,
        .modal .next {
            font-size: 40px;
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 0 30px;
            transition: opacity 0.3s ease;
        }

        .modal .prev:disabled,
        .modal .next:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .modal .prev:hover:not(:disabled),
        .modal .next:hover:not(:disabled) {
            opacity: 0.8;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        /* Error message styling */
        .error-message {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 10001;
        }
    </style>
</head>

<body>
    <!-- Header mới đầy đủ navbar -->
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/user">
                    @if(!empty($config->logo))
                        <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="height: 80px;">
                    @endif
                </a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/user">Home</a></li>
                        @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recognition</a>
                        @else
                            <a class="nav-link" href="#">Recognition (login)</a>
                        @endif
                        <li class="nav-item"><a class="nav-link active" href="/user/architectures/view">Architectures</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>
                        <li class="nav-item">
                            <form class="form-inline d-inline" id="searchForm">
                                <input type="text" id="searchInput" placeholder="Search ...">
                                <button type="submit" id="search-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i> {{ Auth::user()->username }}
            </a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Results</a>
        <a href="/login"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content" id="main-content">
        <div class="container">
            <!-- Sidebar Toggle -->
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="mb-4">Danh sách các dự án</h2>
            <div class="row">
                @if(isset($projects) && $projects->isNotEmpty())
                    @foreach($projects as $projectGroup)
                        @php
                            $firstProject = $projectGroup->first();
                            $firstImage = $firstProject->image_url;
                        @endphp

                        <div class="col-md-12">
                            <div class="card">
                                <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top" alt="{{ $firstProject->name }}">
                                <div class="gallery">
                                    <div class="row">
                                        @foreach($projectGroup->slice(1, 3) as $project)
                                            <div class="col-3">
                                                <div class="image-container">
                                                    <img src="{{ asset('storage/' . $project->image_url) }}" class="img-thumbnail"
                                                         alt="{{ $project->name }}"
                                                         onclick="openModal({{ json_encode($firstProject->name) }})">
                                                </div>
                                            </div>
                                        @endforeach

                                        @if($projectGroup->count() > 4)
                                            <div class="col-3 more-images">
                                                <div class="image-container">
                                                    <img src="{{ asset('storage/' . $projectGroup[4]->image_url) }}" class="img-thumbnail"
                                                         alt="More images"
                                                         onclick="openModal({{ json_encode($firstProject->name) }})">
                                                    <div class="more-overlay">
                                                        <span>+ {{ $projectGroup->count() - 4 }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $firstProject->name }}</h5>
                                    <p class="card-text"><strong>Type:</strong> {{ $firstProject->project_type }}</p>
                                    <p class="card-text"><strong>Status:</strong> {{ $firstProject->status }}</p>
                                    <p class="card-text"><strong>Price:</strong> {{ number_format($firstProject->price) }}$</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p>Không có dự án nào để hiển thị.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal for full-screen gallery -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">×</span>
            <img id="modalImage" src="" alt="Project Image">
            <div class="nav-buttons">
                <button class="prev" onclick="showPrevImage()">❮</button>
                <button class="next" onclick="showNextImage()">❯</button>
            </div>
        </div>
    </div>

    <!-- Error message -->
    <div class="error-message" id="errorMessage"></div>

    <script>
        let currentImageIndex = 0;
        let imageUrls = [];

        // Hiển thị thông báo lỗi
        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 3000);
        }

        // Mở modal với tất cả ảnh cùng nhóm có tên giống như ảnh đã click
        function openModal(projectName) {
            try {
                let projects = @json($projects);
                console.log('Projects data:', projects);

                if (!Array.isArray(projects)) {
                    if (projects && typeof projects === 'object') {
                        projects = Object.values(projects);
                    } else {
                        showError('Dữ liệu dự án không hợp lệ.');
                        console.error('Projects is not an array or object:', projects);
                        return;
                    }
                }

                if (projects.length === 0) {
                    showError('Không có dữ liệu dự án.');
                    console.error('Projects array is empty');
                    return;
                }

                const projectImages = projects
                    .filter(group => group[0] && group[0].name === projectName)
                    .flatMap(group => group.map(project => {
                        return project.image_url.startsWith('storage/')
                            ? "{{ asset('') }}" + project.image_url
                            : "{{ asset('storage') }}/" + project.image_url;
                    }));

                if (projectImages.length === 0) {
                    showError('Không tìm thấy ảnh cho dự án này.');
                    console.error('No images found for project:', projectName);
                    return;
                }

                imageUrls = projectImages;
                currentImageIndex = 0;

                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrls[currentImageIndex] || '';

                const modal = document.getElementById('imageModal');
                modal.style.display = 'flex';

                updateNavButtons();
            } catch (error) {
                showError('Đã xảy ra lỗi khi mở ảnh.');
                console.error('Error in openModal:', error);
            }
        }

        // Đóng modal
        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }

        // Hiển thị ảnh tiếp theo
        function showNextImage() {
            if (currentImageIndex < imageUrls.length - 1) {
                currentImageIndex++;
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrls[currentImageIndex];
                updateNavButtons();
            }
        }

        // Hiển thị ảnh trước đó
        function showPrevImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrls[currentImageIndex];
                updateNavButtons();
            }
        }

        // Cập nhật trạng thái nút điều hướng
        function updateNavButtons() {
            const prevButton = document.querySelector('.modal .prev');
            const nextButton = document.querySelector('.modal .next');
            prevButton.disabled = currentImageIndex === 0;
            nextButton.disabled = currentImageIndex === imageUrls.length - 1;
        }

        // Đóng modal khi nhấn ra ngoài ảnh
        document.getElementById('imageModal').addEventListener('click', function (event) {
            if (event.target === this) {
                closeModal();
            }
        });

        // Sidebar toggle functionality
        document.getElementById('open-btn').addEventListener('click', function () {
            document.getElementById('sidebar').style.left = '0';
            document.getElementById('main-content').style.marginLeft = '250px';
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function () {
            document.getElementById('sidebar').style.left = '-250px';
            document.getElementById('main-content').style.marginLeft = '0';
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>