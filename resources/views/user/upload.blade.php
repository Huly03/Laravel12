<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận diện phong cách kiến trúc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        .navbar {
            background-color: #333;
        }

        .navbar .navbar-brand {
            color: white;
            padding: 0;
        }

        .navbar .navbar-nav .nav-link {
            color: white;
            font-weight: 600;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #1abc9c;
            border-radius: 5px;
        }

        .sidebar {
            position: fixed;
            top: 95px;
            left: -250px;
            width: 250px;
            min-height: 100%;
            background-color: #f5f5dc;
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 1000;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #d4e157;
            color: white;
        }

        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .toggle-btn {
            background-color: #1f2a3f;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            position: absolute;
            top: -15px;
            left: -30px;
            z-index: 999;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .left-panel, .right-panel {
            width: 48%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .upload-form input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        #uploadedImage {
            max-height: 400px;
            width: auto;
            object-fit: contain;
            display: block;
            margin: 20px auto;
            border-radius: 8px;
        }

        #chatbox {
            height: 350px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .upload-btn, .chat-btn {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            border: none;
            margin-top: 15px;
            cursor: pointer;
        }

        .upload-btn:hover, .chat-btn:hover {
            background-color: #0056b3;
        }

        .chat-message.user {
            background-color: #d1e7dd;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-end;
        }

        .chat-message.bot {
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-start;
        }

        #searchContainer {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        #searchInput {
            width: 70%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        #searchBtn {
            padding: 12px 15px;
            margin-left: 10px;
            background-color: #5bc0de;
            border: none;
            border-radius: 5px;
            color: white;
        }

        #searchBtn:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>

<!-- ✅ Header + Navbar -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/user">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/user">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/upload">Nhận diện kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Phong cách kiến trúc</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/projects">Dự án</a></li>
                    <li class="nav-item">
                        <form class="form-inline d-inline" id="searchForm">
                            <input type="text" id="searchInputTop" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- ✅ Sidebar -->
<div class="sidebar" id="sidebar">
    <h4 class="text-center">Menu</h4>
    <a href="#">Tài khoản</a>
    <a href="#">Cài đặt</a>
    <a href="#">Báo cáo</a>
    <a href="/login">Đăng xuất</a>
</div>

<!-- ✅ Main Content -->
<div class="main-content" id="main-content">
    <div class="container">
        <button class="toggle-btn open-btn" id="open-btn"><i class="fas fa-bars"></i></button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;"><i class="fas fa-times"></i></button>

        <!-- Left panel -->
        <div class="left-panel">
            <h1>Nhận diện phong cách kiến trúc</h1>
            <form id="user.uploadForm" enctype="multipart/form-data">
                @csrf
                <label for="image">Chọn ảnh cần nhận diện:</label><br>
                <input type="file" name="image" id="image" required><br><br>
                <div class="button-container">
                    <button type="submit" class="upload-btn">Tiến hành nhận diện</button>
                </div>
            </form>

            <div id="uploadedImageContainer" style="display:none;">
                <h2>Nhận diện hoàn tất</h2>
                <img id="uploadedImage" src="" alt="Uploaded Image">
                <h3>Kết quả</h3>
                <ul id="resultsList"></ul>
            </div>
        </div>

        <!-- Right panel -->
        <div class="right-panel">
            <h1>Mô tả</h1>
            <div id="searchContainer">
                <input type="text" id="searchInput" placeholder="Tìm kiếm phong cách kiến trúc...">
                <button id="searchBtn">Tìm kiếm</button>
            </div>
            <div id="chatbox"></div>
            <input type="text" id="chatInput" placeholder="Hỏi tôi bất cứ điều gì..." />
            <button id="sendChatBtn" class="chat-btn">Gửi</button>
        </div>
    </div>
</div>

<x-footer />

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Sidebar toggle
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

    // AJAX Upload
    $('#user\\.uploadForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '{{ route('uploadImageV2') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#uploadedImage').attr('src', '{{ asset('storage') }}/' + response.imagePath);
                $('#uploadedImageContainer').show();

                const results = response.result.top_5_labels;
                const probabilities = response.result.top_5_probs;

                $('#resultsList').empty();
                results.forEach(function(label, index) {
                    $('#resultsList').append('<li>' + label + ' (' + (probabilities[index] * 100).toFixed(2) + '%)</li>');
                });
            }
        });
    });

    // AJAX Search
    $('#searchBtn').on('click', function() {
        var query = $('#searchInput').val().trim();

        if (query !== "") {
            $.ajax({
                url: 'http://127.0.0.1:5000/search',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ query: query }),
                success: function(response) {
                    $('#chatbox').empty();
                    if (response.matched_articles && response.matched_articles.length > 0) {
                        response.matched_articles.forEach(function(article) {
                            $('#chatbox').append('<div class="chat-message bot">' + article.description + '</div>');
                        });
                    } else {
                        $('#chatbox').append('<div class="chat-message bot">Không tìm thấy bài báo nào phù hợp.</div>');
                    }
                }
            });
        } else {
            alert('Vui lòng nhập từ khóa tìm kiếm.');
        }
    });
</script>

</body>
</html>
