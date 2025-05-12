<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --info-color: #9b59b6;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --dark-color: #34495e;
            --light-color: #ecf0f1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

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

        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 80px;
            left: -250px;
            width: 250px;
            height: calc(100vh - 80px);
            background: linear-gradient(to bottom, #ffffff 0%, #f5f5dc 100%);
            color: #333;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 999;
            transition: left 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            color: #333;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            margin: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: #d4e157;
            color: #333;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        /* Statistics Cards */
        .stat-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            position: relative;
            background: white;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-card .card-body {
            padding: 25px;
        }

        .stat-card .card-icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 2.5rem;
            opacity: 0.2;
            color: white;
        }

        .stat-card .card-title {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        .stat-card .card-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: white;
        }

        .stat-card .card-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stat-card .progress {
            height: 6px;
            background-color: rgba(255, 255, 255, 0.2);
            margin-top: 15px;
            border-radius: 3px;
        }

        .stat-card .progress-bar {
            background-color: white;
        }

        /* Color variants */
        .stat-card.bg-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%);
        }

        .stat-card.bg-success {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #27ae60 100%);
        }

        .stat-card.bg-info {
            background: linear-gradient(135deg, var(--info-color) 0%, #8e44ad 100%);
        }

        .stat-card.bg-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d35400 100%);
        }

        .stat-card.bg-danger {
            background: linear-gradient(135deg, var(--danger-color) 0%, #c0392b 100%);
        }

        .stat-card.bg-dark {
            background: linear-gradient(135deg, var(--dark-color) 0%, #2c3e50 100%);
        }

        /* Architecture Cards */
        .architecture-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            cursor: pointer;
        }

        .architecture-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .architecture-card .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .architecture-card:hover .card-img-top {
            transform: scale(1.03);
        }

        .architecture-card .card-body {
            padding: 20px;
        }

        .architecture-card .card-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .architecture-card .card-text {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Project Gallery Styles */
        .project-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .project-group {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .project-group:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .project-group-header {
            background: linear-gradient(135deg, #1f2a3f 0%, #34495e 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .project-group-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .project-group-count {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .project-group-content {
            padding: 20px;
        }

        .project-gallery {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .project-main-image {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .project-main-image:hover {
            transform: scale(1.02);
        }
        
        .project-thumbnails {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        
        .project-thumbnail {
            width: 100%;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .project-thumbnail:hover {
            transform: scale(1.05);
        }
        
        .thumbnail-container {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .remaining-count {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .remaining-count:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        .view-all-btn {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: var(--primary-color);
            font-weight: 500;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .view-all-btn:hover {
            color: var(--dark-color);
            text-decoration: underline;
        }

        .project-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .project-status {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-in-progress {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-design {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .project-price {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .project-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        /* Toggle buttons */
        .toggle-btn {
            background: linear-gradient(135deg, #1f2a3f 0%, #34495e 100%);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: fixed;
            top: 90px;
            left: 10px;
            z-index: 1001;
        }

        .toggle-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .close-btn {
            display: none;
        }

        /* Section headers */
        .section-header {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 10px;
            color: #2c3e50;
        }

        .section-header:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
        }

        /* Modal Styles */
        .gallery-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            overflow: auto;
        }
        
        .modal-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .modal-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: white;
        }
        
        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .close-modal {
            font-size: 2rem;
            cursor: pointer;
            color: white;
            background: none;
            border: none;
        }
        
        .modal-main-image {
            max-width: 100%;
            max-height: 70vh;
            object-fit: contain;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        
        .modal-thumbnails {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        
        .modal-thumbnail {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .modal-thumbnail:hover {
            transform: scale(1.1);
        }
        
        .modal-thumbnail.active {
            border: 3px solid var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stat-card .card-value {
                font-size: 1.8rem;
            }

            .main-content {
                padding: 20px 15px;
            }

            .project-main-image {
                height: 200px;
            }

            .project-thumbnails {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .project-thumbnails {
                grid-template-columns: 1fr;
            }

            .project-thumbnail {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
<x-header />

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3>      Admin</h3>
        <a href="/result"><i class="fas fa-chart-line"></i> Kết quả</a>
        <a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Danh sách tài khoản</a>
        <a href="/api-calls"><i class="fas fa-code"></i> API Calls</a>
        <a href="/model-selection"><i class="fas fa-robot"></i> AI Models</a>
        <a href="{{ route('admin.website-config.index') }}"><i class="fas fa-cog"></i> Cấu hình Website</a>
        <a href="{{ route('admin.models.index') }}"><i class="fas fa-project-diagram"></i> Models</a>
        <a href="/login"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <div class="container">
            <!-- Toggle buttons -->
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>

            <!-- Statistics Section -->
            <h2 class="section-header">Thống kê hệ thống</h2>
            <div class="row">
                <!-- Projects Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-primary">
                        <i class="fas fa-project-diagram card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">Tổng dự án</h5>
                            <h2 class="card-value">{{ $projectsCount }}</h2>
                            <p class="card-text">Đã hoàn thành: {{ $completedProjects }}</p>
                            <p class="card-text">Đang thi công: {{ $inProgressProjects }}</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ ($completedProjects / $projectsCount) * 100 }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-success">
                        <i class="fas fa-users card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">Người dùng</h5>
                            <h2 class="card-value">{{ $usersCount }}</h2>
                            <p class="card-text">Tổng số tài khoản hệ thống</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- API Calls Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-info">
                        <i class="fas fa-code card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">API Calls</h5>
                            <h2 class="card-value">{{ $apiCallsCount }}</h2>
                            <p class="card-text">Tổng số lần gọi API</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architecture Styles Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-warning">
                        <i class="fas fa-archway card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">Phong cách kiến trúc</h5>
                            <h2 class="card-value">{{ $architecturesCount }}</h2>
                            <p class="card-text">Tổng số phong cách</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AI Models Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-dark">
                        <i class="fas fa-robot card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">AI Models</h5>
                            <h2 class="card-value">{{ $architectureModelsCount }}</h2>
                            <p class="card-text">Tổng số mô hình AI</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recognition Results Card -->
                <div class="col-md-4">
                    <div class="stat-card bg-danger">
                        <i class="fas fa-brain card-icon"></i>
                        <div class="card-body">
                            <h5 class="card-title">Kết quả nhận dạng</h5>
                            <h2 class="card-value">{{ $architectureStylesCount }}</h2>
                            <p class="card-text">Tổng số lần nhận dạng</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Architecture Styles Section -->
            <h2 class="section-header mt-5">Phong cách kiến trúc</h2>
            <div class="row">
                @foreach($architectures as $architecture)
                    <div class="col-md-4">
                        <div class="card architecture-card"
                            onclick="window.location='{{ route('architecture.show', $architecture->id) }}'">
                            <img src="{{ asset('storage/' . $architecture->image_url) }}" class="card-img-top"
                                alt="{{ $architecture->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $architecture->name }}</h5>
                                <p class="card-text">{{ Str::limit($architecture->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Projects Section - Gallery Style -->
            <h2 class="section-header mt-5">Danh sách dự án</h2>
            <div class="project-list">
                @php
                    // Group projects by name
                    $groupedProjects = $projects->groupBy('name');
                @endphp

                @foreach($groupedProjects as $projectName => $projectsGroup)
                    <div class="project-group">
                        <div class="project-group-header">
                            <h3 class="project-group-title">{{ $projectName }}</h3>
                            <span class="project-group-count">{{ $projectsGroup->count() }} ảnh</span>
                        </div>
                        <div class="project-group-content">
                            <div class="project-gallery">
                                <!-- Main Image (first image) -->
                                @if($projectsGroup->first())
                                    <img src="{{ asset('storage/' . $projectsGroup->first()->image_url) }}" 
                                         class="project-main-image" 
                                         alt="{{ $projectName }}"
                                         onclick="openGalleryModal('{{ $projectName }}', {{ $projectsGroup }})">
                                @endif
                                
                                <!-- Thumbnails (next 3 images + remaining count) -->
                                <div class="project-thumbnails">
                                    @foreach($projectsGroup->slice(1, 3) as $index => $project)
                                        <div class="thumbnail-container">
                                            <img src="{{ asset('storage/' . $project->image_url) }}" 
                                                 class="project-thumbnail" 
                                                 alt="{{ $projectName }}"
                                                 onclick="openGalleryModal('{{ $projectName }}', {{ $projectsGroup }}, {{ $index + 1 }})">
                                        </div>
                                    @endforeach
                                    
                                    @if($projectsGroup->count() > 4)
                                        <div class="thumbnail-container" 
                                             onclick="openGalleryModal('{{ $projectName }}', {{ $projectsGroup }})">
                                            <img src="{{ asset('storage/' . $projectsGroup[3]->image_url) }}" 
                                                 class="project-thumbnail" 
                                                 alt="{{ $projectName }}">
                                            <div class="remaining-count">
                                                +{{ $projectsGroup->count() - 4 }}
                                            </div>
                                        </div>
                                    @elseif($projectsGroup->count() == 4)
                                        <div class="thumbnail-container">
                                            <img src="{{ asset('storage/' . $projectsGroup[3]->image_url) }}" 
                                                 class="project-thumbnail" 
                                                 alt="{{ $projectName }}"
                                                 onclick="openGalleryModal('{{ $projectName }}', {{ $projectsGroup }}, 3)">
                                        </div>
                                    @endif
                                </div>
                                
                                <span class="view-all-btn" onclick="openGalleryModal('{{ $projectName }}', {{ $projectsGroup }})">
                                    Xem tất cả {{ $projectsGroup->count() }} ảnh
                                </span>
                            </div>
                            
                            <!-- Project details (status, price, etc.) -->
                            @foreach($projectsGroup->take(1) as $project)
                                <div class="project-meta mt-3">
                                    <span><strong>Loại:</strong> {{ $project->project_type }}</span>
                                    <span class="project-status 
                                                {{ $project->status == 'Hoàn thành' ? 'status-completed' : '' }}
                                                {{ $project->status == 'Đang thi công' ? 'status-in-progress' : '' }}
                                                {{ $project->status == 'Bản thiết kế' ? 'status-design' : '' }}">
                                        {{ $project->status }}
                                    </span>
                                </div>
                                <div class="project-price">{{ number_format($project->price, 2) }} VNĐ</div>
                                
                                <div class="project-actions mt-3">
                                    <a href="{{ route('project.edit', $project->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Chỉnh sửa
                                    </a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa dự án này?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Gallery Modal -->
            <div id="galleryModal" class="gallery-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalProjectTitle"></h3>
                        <button class="close-modal" onclick="closeGalleryModal()">&times;</button>
                    </div>
                    <img id="modalMainImage" class="modal-main-image" src="" alt="">
                    <div class="modal-thumbnails" id="modalThumbnails"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
        let sidebarOpen = false;
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const openBtn = document.getElementById('open-btn');
        const closeBtn = document.getElementById('close-btn');

        function openSidebar() {
            sidebarOpen = true;
            sidebar.style.left = '0';
            mainContent.style.marginLeft = '250px';
            openBtn.style.display = 'none';
            closeBtn.style.display = 'flex';
        }

        function closeSidebar() {
            sidebarOpen = false;
            sidebar.style.left = '-250px';
            mainContent.style.marginLeft = '0';
            openBtn.style.display = 'flex';
            closeBtn.style.display = 'none';
        }

        openBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (event) {
            if (window.innerWidth <= 768 && sidebarOpen) {
                if (!sidebar.contains(event.target) && event.target !== openBtn) {
                    closeSidebar();
                }
            }
        });
        
        // Gallery Modal Functions
        function openGalleryModal(projectName, projects, initialIndex = 0) {
            const modal = document.getElementById('galleryModal');
            const modalTitle = document.getElementById('modalProjectTitle');
            const modalMainImage = document.getElementById('modalMainImage');
            const modalThumbnails = document.getElementById('modalThumbnails');
            
            // Set modal title
            modalTitle.textContent = projectName;
            
            // Clear previous thumbnails
            modalThumbnails.innerHTML = '';
            
            // Convert Laravel collection to array if needed
            const projectsArray = Array.isArray(projects) ? projects : Object.values(projects);
            
            // Create thumbnails
            projectsArray.forEach((project, index) => {
                const img = document.createElement('img');
                img.src = "{{ asset('storage/') }}/" + project.image_url;
                img.className = 'modal-thumbnail' + (index === initialIndex ? ' active' : '');
                img.alt = projectName;
                img.onclick = () => {
                    // Update main image
                    modalMainImage.src = img.src;
                    
                    // Update active thumbnail
                    document.querySelectorAll('.modal-thumbnail').forEach(thumb => {
                        thumb.classList.remove('active');
                    });
                    img.classList.add('active');
                };
                
                modalThumbnails.appendChild(img);
            });
            
            // Set initial main image
            if (projectsArray[initialIndex]) {
                modalMainImage.src = "{{ asset('storage/') }}/" + projectsArray[initialIndex].image_url;
            }
            
            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeGalleryModal() {
            const modal = document.getElementById('galleryModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        // Close modal when clicking outside content
        window.onclick = function(event) {
            const modal = document.getElementById('galleryModal');
            if (event.target === modal) {
                closeGalleryModal();
            }
        };
    </script>
</body>
</html>