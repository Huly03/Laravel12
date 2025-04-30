<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>Nhận diện phong cách kiến trúc</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%; /* Đảm bảo chiều cao đầy đủ để min-height của sidebar hoạt động */
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: ghostwhite;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            padding: 30px;
            background-color: ghostwhite;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        .header {
            background-color: ghostwhite;
            color: white;
            padding: 20px 0;
            text-align: center;
            height: 80px;
        }

        .header img {
            height: 100%;
            width: auto;
        }

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
            background-color: #1E3A8A;
            color: white;
        }

        .sidebar {
            position: fixed;
            top: 100px;
            left: -250px;
            width: 250px;
            min-height: calc(100% - 100px); /* Trừ đi chiều cao của header */
            background-color: ghostwhite; /* Đặt lại màu để dễ nhìn */
            color: black;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 1000; /* Tăng z-index để sidebar hiển thị phía trên */
            transition: left 0.3s ease;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: ghostwhite;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: navy;
            color: white;
        }

        .toggle-btn {
            background-color: ghostwhite;
            color: navy;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .container {
            background-color: ghostwhite;
            border-radius: 12px;
            padding: 30px;
            
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
        }

        .right-panel {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        #chatbox {
            box-sizing: border-box;
            height: 350px;
            overflow-y: auto;
            
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: ghostwhite;
            
            width: 70%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chat-message.user {
            background-color:white;
            color: black;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-end;
            text-align: right;
            display: flex;
            flex-direction: row-reverse;
        }

        .chat-message.bot {
            background-color: ghostwhite;
            color: black;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-start;
            text-align: left;
            display: flex;
            flex-direction: row;
        }

        .chat-message img {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
            margin-left: 10px;
            margin-right: 10px;
        }

        #uploadForm {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .image-upload-label,
        .camera-upload-label,
        #sendChatBtn {
            border-radius: 12px;
            cursor: pointer;
            font-size: 24px;
            color: black;
            padding: 8px;
        }

        #chatInput {
            height: 40px;
            border: 1px solid white;
            border-radius: 24px;
            padding: 10px;
            background-color: white;
            font-size: 1rem;
            overflow-y: auto;
            white-space: pre-wrap;
            width: 100%;
        }

        #chatInput img {
            max-width: 40px;
            max-height: 40px;
            object-fit: contain;
            margin-left: 0px;
        }

        .panel-overlay {
            position: relative;
            width: 100%;
            max-width: 51rem;
            background-color: white;
            border-radius: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: border-color 0.1s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 8px;
        }

        .panel-overlay:hover {
            border-color: #9ca3af;
        }

        .panel-overlay:focus-within {
            border-color: #9ca3af;
        }

        .panel-overlay:hover:focus-within {
            border-color: #9ca3af;
        }

        @media (min-width: 480px) {
            .panel-overlay {
                padding-left: 12px;
                padding-right: 12px;
            }
        }

        .icon-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
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
                            <a class="nav-link"
                                href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Recogintion</a>
                        @else
                            <a class="nav-link" href="#">Recogintion (login)</a>
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
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->username }}</a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Profile</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i>Results</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    <div class="main-content" id="main-content">
        <button class="toggle-btn open-btn" id="open-btn">
            <i class="fas fa-bars"></i>
        </button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
            <i class="fas fa-times"></i>
        </button>
        <div class="container">
            <div class="right-panel">
                <div id="chatbox"></div>
                <form id="uploadForm" action="{{ route('uploadImage', ['id' => $user_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="panel-overlay">
                        <div id="chatInput" contenteditable="true" class="form-control" placeholder="Nhập câu hỏi..."></div>
                        <div class="icon-group">
                            <label for="image" class="image-upload-label">
                                <i class="fas fa-image"></i>
                            </label>
                            <input type="file" name="image" id="image" required style="display:none;"
                                onchange="handleImageUpload()">
                            <button id="sendChatBtn" class="chat-btn" onclick="handleSendChat()">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <video id="video" width="300" height="200" style="display:none;" autoplay></video>
                <canvas id="canvas" style="display:none;"></canvas>
            </div>
        </div>
    </div>

    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        document.getElementById('cameraBtn')?.addEventListener('click', function () {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        document.getElementById('video').style.display = 'block';
                        document.getElementById('video').srcObject = stream;
                        document.getElementById('video').addEventListener('click', function () {
                            takeSnapshot();
                        });
                    })
                    .catch(function (error) {
                        console.error("Lỗi khi mở camera: ", error);
                        alert("Không thể mở camera. Vui lòng cấp quyền truy cập!");
                    });
            } else {
                alert("Trình duyệt của bạn không hỗ trợ camera.");
            }
        });

        $('#uploadForm').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '{{ route("uploadImage", ["id" => $user_id]) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Response from server: ", response);
                    if (response.result) {
                        const top1 = response.result.top_5_labels[0];
                        sendToChatbot(top1);
                    } else {
                        alert('Không có kết quả nhận diện hợp lệ');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Upload error:", error);
                    alert('Lỗi khi nhận diện hình ảnh: ' + error);
                }
            });
        });

        function sendToChatbot(top1) {
            $('#chatbox').append('<div class="chat-message bot">Phong cách kiến trúc nhận diện: ' + top1 + '</div>');
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);

            $.ajax({
                url: 'http://127.0.0.1:5000/api/chatbot',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    "user_input": "Thông tin về phong cách kiến trúc " + top1,
                    "language": "vi"
                }),
                success: function (chatbotResponse) {
                    console.log("Chatbot response:", chatbotResponse);
                    $('#chatbox').append('<div class="chat-message bot">' + chatbotResponse.response + '</div>');
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                }
            });
        }

        $('#sendChatBtn').on('click', function (event) {
            event.preventDefault();
            var userMessage = $('#chatInput').text().trim();
            var hasImage = $('#chatInput img').length > 0;

            if (userMessage !== "" || hasImage) {
                if (userMessage !== "") {
                    $('#chatbox').append('<div class="chat-message user">' + userMessage + '</div>');
                    $('#chatInput').text('');
                }

                if (userMessage !== "") {
                    $.ajax({
                        url: 'http://127.0.0.1:5000/api/chatbot',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({ "user_input": userMessage, "language": "vi" }),
                        success: function (response) {
                            $('#chatbox').append('<div class="chat-message bot">' + response.response + '</div>');
                            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error:", error);
                            alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                        }
                    });
                }

                if (hasImage) {
                    var imageElement = $('#chatInput img');
                    var imageSrc = imageElement.attr('src');
                    imageElement.remove();
                    $('#chatbox').append('<div class="chat-message user"><img src="' + imageSrc + '" alt="User Image"></div>');
                    var formData = new FormData($('#uploadForm')[0]);
                    $.ajax({
                        url: '{{ route("uploadImage", ["id" => $user_id]) }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log("Response from server:", response);
                            if (response.result) {
                                $('#uploadedImage').attr('src', '/storage/' + response.imagePath);
                                $('#uploadedImageContainer').show();
                                $('#resultsList').empty();
                                response.result.top_5_labels.forEach(function (label, index) {
                                    $('#resultsList').append('<li>' + label + ' (' + (response.result.top_5_probs[index] * 100).toFixed(2) + '%)</li>');
                                });
                                const top1 = response.result.top_5_labels[0];
                                sendToChatbot(top1); // Sửa lỗi cú pháp .flowsendToChatbot
                            } else {
                                alert('Không có kết quả nhận diện hợp lệ');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Upload error:", error);
                            alert('Lỗi khi nhận diện hình ảnh: ' + error);
                        }
                    });
                }
            } else {
                alert('Vui lòng nhập tin nhắn hoặc chọn ảnh.');
            }
        });

        $('#chatInput').on('keydown', function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                $('#sendChatBtn').click();
            }
        });

        $('#searchBtn').on('click', function () {
            var query = $('#searchInput.form-control').val().trim();
            console.log("Query entered: " + query);

            if (query !== "") {
                console.log("Sending query:", query);
                $.ajax({
                    url: 'http://127.0.0.1:5000/search',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ query: query }),
                    success: function (response) {
                        console.log("Response from Flask API:", response);
                        if (response.matched_articles && response.matched_articles.length > 0) {
                            $('#chatbox').empty();
                            response.matched_articles.forEach(function (article) {
                                $('#chatbox').append('<div class="chat-message bot">' + article.description + '</div>');
                            });
                        } else {
                            $('#chatbox').append('<div class="chat-message bot">Không tìm thấy bài báo nào phù hợp.</div>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error sending request to Flask:', error);
                        alert('Đã có lỗi xảy ra khi tìm kiếm: ' + error);
                    }
                });
            } else {
                console.log("Query is empty or contains only spaces.");
                alert('Vui lòng nhập từ khóa tìm kiếm.');
            }
        });

        $('#image').on('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Image Preview";
                    const chatInput = document.getElementById('chatInput');
                    chatInput.appendChild(img);
                    chatInput.scrollTop = chatInput.scrollHeight;
                }
                reader.readAsDataURL(file);
            }
        });

        function takeSnapshot() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageDataUrl = canvas.toDataURL('image/jpeg');
            fetch(imageDataUrl)
                .then(res => res.blob())
                .then(blob => {
                    const imgUrl = URL.createObjectURL(blob);
                    video.style.display = 'none';
                    const stream = video.srcObject;
                    const tracks = stream.getTracks();
                    tracks.forEach(function (track) {
                        track.stop();
                    });
                    const chatInput = document.getElementById('chatInput');
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    chatInput.innerHTML = '';
                    chatInput.appendChild(img);
                })
                .catch(error => console.error('Lỗi khi tạo Blob từ Data URL:', error));
        }
    </script>
</body>

</html>