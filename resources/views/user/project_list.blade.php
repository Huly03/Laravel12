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
    <!-- Style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            /* Giảm khoảng cách giữa các card */
        }

        .card-img-top {
            height: 320px;
            /* Giảm từ 400px */
        }

        .card-body {
            padding: 20px;
            /* Giảm padding */
        }

        h2 {
            font-size: 2rem;
            /* Giảm từ 2.5rem */
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 1.5rem;
            /* Giảm từ 1.8rem */
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
            position: relative;
            /* Để chứa ảnh với tỷ lệ 1:1 */
        }

        .gallery .col-3 .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 100%;
            /* Tạo tỷ lệ 1:1 dựa trên chiều rộng */
        }

        .gallery .col-3 {
            flex: 0 0 calc(25% - 10px);
            /* Điều chỉnh khoảng cách */
            max-width: calc(25% - 10px);
        }

        .gallery .image-container {
            padding-bottom: 90%;
            /* Thay đổi tỷ lệ khung hình */
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

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .card-img-top {
                height: 250px;
            }

            .gallery .col-3 {
                flex: 0 0 calc(50% - 5px);
                max-width: calc(50% - 5px);
            }
        }

        /* More overlay */
        .more-images {
            position: relative;
            cursor: pointer;
        }

        .more-images .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 100%;
            /* Tỷ lệ 1:1 */
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

        footer.site-footer {
            padding: 20px;
            background: #222;
            color: white;
        }

        footer {
            background-color: white;
            color: black;
            padding: 40px 0;
            font-size: 14px;
            z-index: 1000;
            /* Giảm z-index */
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            width: 30%;
            margin-bottom: 20px;
            flex-basis: 30%;
        }

        @media (max-width: 768px) {
            .footer-section {
                width: 100%;
            }
        }

        .footer-section h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-section a {
            color: navy;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color: navy;
        }

        .social-icons {
            display: flex;
            justify-content: start;
            gap: 10px;
            margin-top: 10px;
        }

        .social-icons a {
            font-size: 20px;
            color: navy;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: navy
        }

        .project {
    max-width: 650px;
    padding: 0 20px;
    margin: 0 auto; /* Căn giữa theo chiều ngang */
    width: 100%; /* Đảm bảo chiều rộng tối đa là 650px */
}

        .auth-btn {
            padding: 8px 20px;
            border-radius: 3px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s;
        }

        .login-btn {
            background: transparent;
            color: #555;
            border: 1px solid #ddd;
        }

        .login-btn:hover {
            border-color: #007bff;
            color: #007bff;
        }

        .register-btn {
            background: #4a6fa5;
            color: white;
            border: 1px solid #4a6fa5;
        }

        .register-btn:hover {
            background: #3a5a8f;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>
    <!-- Header Area -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-sm-8">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="{{ Auth::check() ? route('my.account') : route('login') }}">
                                            Hello {{ Auth::check() ? Auth::user()->fullname : 'Guest' }}
                                        </a></li>
                                    <li><a href="#">Hello World!</a></li>
                                    <li><a href="#">Hello Universe!</a></li>
                                    <li><a href="#">Hello ArchStyAi!</a></li>
                                    <li><a href="#">Hello Earth!</a></li>
                                    <li><a href="#">Hello Architecture! </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Social Area -->
                    <div class="col-12 col-sm-4">
                        <div class="top-social-area">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fab fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i
                                    class="fab fa-dribbble"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i
                                    class="fab fa-behance"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a class="original-logo" href="/">
                            @if(!empty($config->logo))
                                <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="height: 200px;">
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">
                        <!-- Subscribe btn -->
                        <div class="auth-buttons">
                            <a href="/login" class="btn auth-btn login-btn">Login</a>
                            <a href="/register" class="btn auth-btn register-btn">Register</a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                                            <li><a href="{{ route('single-post') }}">Single Post</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                            <li><a href="{{ route('coming-soon') }}">Coming Soon</a></li>
                                            <li><a href="{{ route('architecture.viewOnly') }}">Architectures</a></li>
                                            <li><a href="{{ route('project.index') }}">Projects</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    <!-- <li><a href="#">Megamenu</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 1</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="https://drive.google.com/drive/folders/1mnsvfSjxPI2hM_KxWLmWZZaYdLKO1_C-?usp=drive_link">Download</a>

                                        <!-- <ul class="dropdown">
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
<div id="search-wrapper">
                                    <form action="{{ route('search') }}" method="get">
                                        <input type="text" id="search" name="query" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content" id="main-content">
        <div class="project">
            <h2 class="mb-4">Projects</h2>
            <div class="row">
                @if(isset($projects) && $projects->isNotEmpty())
                    @foreach($projects as $projectGroup)
                        @php
                            $firstProject = $projectGroup->first();
                            $firstImage = $firstProject->image_url;
                        @endphp

                        <div class="col-md-12">
                            <div class="card">
                                <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top"
                                    alt="{{ $firstProject->name }}">
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
                                                    <img src="{{ asset('storage/' . $projectGroup[4]->image_url) }}"
                                                        class="img-thumbnail" alt="More images"
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
    <footer>
        <div class="container footer-container">
            <div class="footer-section">
                <h5>Company</h5>
                <a href="#">{{ $config->business_info }}</a>
            </div>
            <div class="footer-section">
                <h5>Address</h5>
                <a href="#">{{ $config->address }}</a>
            </div>
            <div class="footer-section">
                <h5>Contact</h5>
                <a href="tel:{{ $config->contact_phone }}">{{ $config->contact_phone }}</a>
                <a href="mailto:{{ $config->contact_email }}">{{ $config->contact_email }}</a>
                <div class="social-icons">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                            class="fab fa-pinterest"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i
                            class="fab fa-dribbble"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i
                            class="fab fa-behance"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel CSS -->
    <!-- Owl Carousel CSS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
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

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>