<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords  }}">
    <title>Kết quả đã nhận diện</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>


        .container {
            max-width: 1200px;
            margin-top: 30px;
        }



        .card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 100%;
            position: relative;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-weight: bold;
            color: #333;
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
        }

        .btn {
            font-size: 0.9rem;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .col-md-4 {
            width: 100%;
        }

        .col-lg-3 {
            width: 25%;
        }

        .text-center {
            text-align: center;
        }

        .g-4 {
            gap: 20px;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }
/* Card container */
.card.shadow-sm {
    background: #ffffff;
    border: none;
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    box-shadow: 0 8px 20px rgba(30, 58, 138, 0.1); /* Navy tone bóng */
    height: 100%;
    display: flex;
    flex-direction: column;
}

/* Card hover */
.card.shadow-sm:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 32px rgba(30, 58, 138, 0.2);
}

/* Card image */
.card-img-top {
    height: 220px;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
    border-bottom: 1px solid #e0e0e0;
}

.card-img-top:hover {
    transform: scale(1.05);
}

/* Card body */
.card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Card title */
.card-title {
    font-size: 20px;
    font-weight: 700;
    color: #1E3A8A;
    margin-bottom: 12px;
    text-align: center;
}

/* Card text */
.card-text {
    font-size: 14px;
    color: #6b7280;
    text-align: center;
    margin-bottom: 20px;
}

/* Delete button */
.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    border-radius: 8px;
    font-size: 14px;
    padding: 8px 16px;
    width: 100%;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background-color: #b02a37;
    border-color: #b02a37;
}

/* Flex for delete button */
.d-flex.justify-content-between {
    margin-top: auto;
}

/* Responsive grid fix */
.row.g-4 {
    margin-top: 30px;
}

        .card-body {
            padding: 20px;
            flex-grow: 1;
        }

        .alert {
            background-color: #e2e3e5;
            color: #6c757d;
            border-radius: 10px;
            padding: 10px;
        }

        /* Flexbox adjustments for centering cards */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Centers the cards horizontally */
            gap: 20px; /* Adds gap between the cards */
        }

        /* Ensures that cards take up 25% width on large screens, 33% on medium, and 50% on smaller screens */
        .col-md-4 {
            flex: 1 0 33%;
            max-width: 33%;
        }

        .col-lg-3 {
            flex: 1 0 25%;
            max-width: 25%;
        }

        @media (max-width: 1200px) {
            .col-lg-3 {
                flex: 1 0 33%;
                max-width: 33%;
            }
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 1 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 576px) {
            .col-md-4 {
                flex: 1 0 100%;
                max-width: 100%;
            }
        }

        .container {
            position: relative;
        }

/* General body and layout styling */
body {
            font-family: Arial, sans-serif;
            background-color: ghostwhite;
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
            /* Remove margin from bottom of the navbar */
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
            /* Navy Blue */
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #1E3A8A;
            border-radius: 5px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .navbar .navbar-nav .nav-link.archive-btn:hover {
            background-color: #1E3A8A;
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



    </style>
</head>

<body>
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
                        <li class="nav-item"><a class="nav-link active" href="/user">Home</a></li>
                        @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recogintion</a>
                        @else
                            <a class="nav-link" href="#">Recogintion</a> (login)</a>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Architectures</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/projects">Projects</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
        <b href="{{ Auth::check() ? route('account.profile') : route('login') }}">
        <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->fullname }}</b>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Result</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <div class="main-content" id="main-content">
        <div class="container">
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-center text-primary mb-4">Architectural Style Recognition Results</h2>

            @if($images->isEmpty())
                <p class="text-center">Bạn chưa sử dụng hệ thống nhận diện phong cách kiến trúc lần nào.</p>
            @else
                <div class="row g-4">
                    @foreach($images as $image)
                    <div class="col-md-4 col-lg-3">
    <div class="card shadow-sm">
        <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="{{ $image->style }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $image->style }}</h5>

            <div class="d-flex justify-content-between">
                <form action="{{ route('deleteImage', $image->id) }}" method="POST" style="width: 100%;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle functionality
        let sidebarOpen = false;

        document.getElementById('open-btn').addEventListener('click', function () {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0';
            document.getElementById('main-content').style.marginLeft = '250px';
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function () {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px';
            document.getElementById('main-content').style.marginLeft = '0';
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });
    </script>
</body>

</html>
