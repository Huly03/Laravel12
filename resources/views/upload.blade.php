<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architecture Style Recognition</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* General body and layout styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content area styling */
        .main-content {
            padding: 30px;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
        }

        /* Header styling */
        .header {
            background-color: #1f2a3f;
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

        /* Sidebar styling */
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
            z-index: 0;
            transition: left 0.3s ease;
        }

        .sidebar a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: #f5f5dc;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #d4e157;
            color: white;
        }

        /* Main container styling */
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
        }

        /* Right panel (container for chatbox and form) */
        .right-panel {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        /* Chatbox styling */
        #chatbox {
            box-sizing: border-box;
            height: 350px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Giảm khoảng cách giữa các tin nhắn */
        }

        /* User message styling */
        .chat-message.user {
            background-color: #d1e7dd;
            color: #495057;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-end;
            /* Căn sang bên phải */
            text-align: right;
            display: flex;
            flex-direction: row-reverse;
            /* Để hình ảnh hiển thị bên phải văn bản */
        }

        /* Bot message styling */
        .chat-message.bot {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-start;
            /* Điều chỉnh căn trái */
            text-align: left;
            /* Căn trái văn bản */
            display: flex;
            flex-direction: row;
        }


        /* Image inside messages */
        .chat-message img {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
            margin-left: 10px;
            margin-right: 10px;
        }

        /* Upload form styling */
        #uploadForm {
            display: flex;
            /* Sử dụng flexbox để sắp xếp các phần tử theo hàng ngang */
            justify-content: center;
            /* Căn giữa các phần tử theo chiều ngang */
            align-items: center;
            /* Căn giữa các phần tử theo chiều dọc */
            gap: 20px;
            /* Khoảng cách giữa các phần tử */
            width: 100%;
            /* Đảm bảo chiều rộng đầy đủ */
        }

        /* Input and button styling */
        #chatInput {
            height: 40px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 1rem;
            overflow-y: auto;
            white-space: pre-wrap;
            flex-grow: 1;
            width: 80%;

        }

        /* Chỉnh kích thước icon cho Font Awesome */
        .image-upload-label,
        .camera-upload-label,
        #sendChatBtn {
            border-radius: 12px;
            cursor: pointer;
            font-size: 24px;
            color: #007bff;
        }

        #chatInput img {
            max-width: 30px;
            max-height: 30px;
            object-fit: contain;
            margin-left: -100px;
        }
    </style>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/user">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 60px; width: auto;">
                </a>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="/user">Trang chủ</a></li>
                        @if(session('user_id'))
                            <a class="nav-link" href="{{ route('uploadImage', ['id' => session('user_id')]) }}">Nhận diện
                                kiến trúc</a>
                        @else
                            <a class="nav-link" href="#">Nhận diện kiến trúc (Chưa đăng nhập)</a>
                        @endif


                        <li class="nav-item"><a class="nav-link" href="/user/architectures/view">Phong cách kiến
                                trúc</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/projects">Dự án</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">
            <!-- Hiển thị username của người dùng đã đăng nhập -->
            <a href="{{ Auth::check() ? route('account.profile') : route('login') }}">
                <i class="fas fa-user-circle text-center"></i>{{ Auth::user()->username }}</a>
        </h3>
        <a href="{{ route('my.account') }}"><i class="fas fa-id-card-alt"></i> Thông tin của tôi</a>
        <a href="{{ route('images.index') }}"><i class="fas fa-image"></i> Kết quả</a>
        <a href="/login">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
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

            <!-- Phần Chatbot -->
            <div class="right-panel">


                <!-- Thanh tìm kiếm phía trên Chatbot -->


                <div id="chatbox">

                </div>

                <!-- Thay thế input bằng một div có contenteditable -->
                <form id="uploadForm" action="{{ route('uploadImage', ['id' => $user_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Nút chọn ảnh cho nhận diện với icon -->
                    <label for="image" class="image-upload-label">
                        <i class="fas fa-image"></i> <!-- Icon hình ảnh -->
                    </label>
                    <input type="file" name="image" id="image" required style="display:none;"
                        onchange="handleImageUpload()">

                    <!-- Nút máy ảnh -->
                    <label type="button" id="cameraBtn" class="camera-upload-label">
                        <i class="fas fa-camera"></i> <!-- Icon máy ảnh -->
                    </label>

                    <!-- Textbox cho nhập liệu -->
                    <div id="chatInput" contenteditable="true" class="form-control" placeholder="Nhập câu hỏi...">
                    </div>

                    <!-- Nút gửi tin nhắn cho chatbot với icon gửi -->
                    <button id="sendChatBtn" class="chat-btn" onclick="handleSendChat()">
                        <i class="fas fa-paper-plane"></i> Gửi
                    </button>

                </form>

                <!-- Thẻ video và canvas ẩn để sử dụng cho camera -->
                <video id="video" width="300" height="200" style="display:none;" autoplay></video>
                <canvas id="canvas" style="display:none;"></canvas>






                <!-- 
                <div id="uploadedImageContainer" style="display:none;">
                    <h2>Nhận diện hoàn tất</h2>
                    <img id="uploadedImage" src="" alt="Uploaded Image">
                    <h3>Kết quả</h3>
                    <ul id="resultsList"></ul>
                </div> -->

            </div>

        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mặc định sidebar đóng và hiển thị nút "open"
        let sidebarOpen = false;

        // Mở sidebar khi click vào nút "open"
        document.getElementById('open-btn').addEventListener('click', function () {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0'; // Mở sidebar
            document.getElementById('main-content').style.marginLeft = '250px'; // Dịch chuyển nội dung
            document.getElementById('open-btn').style.display = 'none'; // Ẩn nút "open"
            document.getElementById('close-btn').style.display = 'block'; // Hiển thị nút "close"
        });

        // Đóng sidebar khi click vào nút "close"
        document.getElementById('close-btn').addEventListener('click', function () {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px'; // Đóng sidebar
            document.getElementById('main-content').style.marginLeft = '0'; // Trả lại margin cho nội dung
            document.getElementById('open-btn').style.display = 'block'; // Hiển thị nút "open"
            document.getElementById('close-btn').style.display = 'none'; // Ẩn nút "close"
        });
        // Sự kiện camera
        document.getElementById('cameraBtn').addEventListener('click', function () {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        document.getElementById('video').style.display = 'block';
                        document.getElementById('video').srcObject = stream;

                        // Lắng nghe sự kiện click vào video để chụp ảnh
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

    </script>

    <script>
        // Sự kiện gửi ảnh nhận diện
        $('#uploadForm').on('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            var formData = new FormData(this); // Get form data

            $.ajax({
                url: '{{ route("uploadImage", ["id" => $user_id]) }}', // POST request to controller
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Response from server: ", response);
                    if (response.result) {
                        const top1 = response.result.top_5_labels[0]; // Get top1 result

                        // Gửi kết quả nhận diện top1 vào chatbot
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
            // Hiển thị kết quả top1 từ nhận diện ở bên trái, giống như tin nhắn chatbot
            $('#chatbox').append('<div class="chat-message bot">Phong cách kiến trúc nhận diện: ' + top1 + '</div>');
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight); // Cuộn xuống cuối chatbox để thấy tin nhắn

            // Gửi yêu cầu đến chatbot API
            $.ajax({
                url: 'http://127.0.0.1:5000/api/chatbot', // API chatbot của bạn
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    "user_input": "Thông tin về phong cách kiến trúc " + top1,
                    "language": "vi"
                }),
                success: function (chatbotResponse) {
                    console.log("Chatbot response:", chatbotResponse);
                    // Hiển thị phản hồi từ chatbot (gửi về bên trái)
                    $('#chatbox').append('<div class="chat-message bot">' + chatbotResponse.response + '</div>');
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                }
            });
        }


        $('#sendChatBtn').on('click', function (event) {
            event.preventDefault(); // Ngừng hành động mặc định của nút submit

            var userMessage = $('#chatInput').text().trim();
            var hasImage = $('#chatInput img').length > 0; // Kiểm tra có ảnh trong chatInput không

            // Nếu có văn bản, thêm vào chatbox và gửi tới chatbot
            if (userMessage !== "") {
                // Thêm tin nhắn người dùng vào chatbox (gửi đi bên phải)
                $('#chatbox').append('<div class="chat-message user">' + userMessage + '</div>');
                $('#chatInput').text(''); // Xóa nội dung trong input

                // Gửi yêu cầu tới chatbot nếu có văn bản
                $.ajax({
                    url: 'http://127.0.0.1:5000/api/chatbot', // API chatbot của bạn
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ "user_input": userMessage, "language": "vi" }),
                    success: function (response) {
                        // Hiển thị phản hồi từ chatbot (gửi về bên trái)
                        $('#chatbox').append('<div class="chat-message bot">' + response.response + '</div>');
                        $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                        alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                    }
                });
            }

            // Nếu có ảnh, gửi yêu cầu upload ảnh
            if (hasImage) {
                // Lấy ảnh từ chatInput và ẩn nó khỏi chatInput
                var imageElement = $('#chatInput img');
                var imageSrc = imageElement.attr('src');

                // Xóa ảnh khỏi chatInput
                imageElement.remove();

                // Thêm ảnh vào chatbox như một tin nhắn của người dùng (gửi đi bên phải)
                $('#chatbox').append('<div class="chat-message user"><img src="' + imageSrc + '" alt="User Image"></div>');

                // Gửi ảnh qua form
                var formData = new FormData($('#uploadForm')[0]); // Lấy dữ liệu từ form
                $.ajax({
                    url: '{{ route("uploadImage", ["id" => $user_id]) }}', // Địa chỉ xử lý ảnh
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
                            // Gửi kết quả vào chatbot nếu có ảnh (gửi về bên trái)
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
            } else if (!hasImage && userMessage === "") {
                alert('Vui lòng nhập tin nhắn hoặc chọn ảnh.');
            }
        });

        function sendToChatbot(top1) {
    // Hiển thị kết quả nhận diện top1 từ hệ thống nhận diện ảnh ở bên trái (chatbot)
    $('#chatbox').append('<div class="chat-message bot">Phong cách kiến trúc nhận diện: ' + top1 + '</div>');
    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight); // Cuộn xuống cuối chatbox để thấy tin nhắn

    // Gửi yêu cầu đến chatbot API
    $.ajax({
        url: 'http://127.0.0.1:5000/api/chatbot', // API chatbot của bạn
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            "user_input": "Thông tin về phong cách kiến trúc " + top1,
            "language": "vi"
        }),
        success: function (chatbotResponse) {
            console.log("Chatbot response:", chatbotResponse);
            // Hiển thị phản hồi từ chatbot (gửi về bên trái)
            $('#chatbox').append('<div class="chat-message bot">' + chatbotResponse.response + '</div>');
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
        }
    });
}

        // Search functionality
        $('#searchBtn').on('click', function () {
            var query = $('#searchInput.form-control').val().trim();  // Get the value from the search input and remove any leading/trailing spaces

            console.log("Query entered: " + query);  // Log the query entered by the user

            // Check if the query is not empty
            if (query !== "") {
                console.log("Sending query:", query);  // Log the data being sent
                $.ajax({
                    url: 'http://127.0.0.1:5000/search',  // Your search API endpoint
                    method: 'POST',
                    contentType: 'application/json',  // Ensure that the data is being sent as JSON
                    data: JSON.stringify({ query: query }),  // Send the query in JSON format
                    success: function (response) {
                        console.log("Response from Flask API:", response);  // Log the response from the backend
                        if (response.matched_articles && response.matched_articles.length > 0) {
                            $('#chatbox').empty();  // Clear previous search results
                            response.matched_articles.forEach(function (article) {
                                $('#chatbox').append('<div class="chat-message bot">' + article.description + '</div>');
                            });
                        } else {
                            $('#chatbox').append('<div class="chat-message bot">Không tìm thấy bài báo nào phù hợp.</div>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error sending request to Flask:', error);  // Log any errors
                        alert('Đã có lỗi xảy ra khi tìm kiếm: ' + error);  // Show an error message
                    }
                });
            } else {
                // Log a message if the query is empty or contains only spaces
                console.log("Query is empty or contains only spaces.");
                alert('Vui lòng nhập từ khóa tìm kiếm.');
            }
        });
        $('#image').on('change', function (event) {
            const file = event.target.files[0];  // Lấy file ảnh người dùng chọn
            if (file) {
                const reader = new FileReader();

                // Sau khi file ảnh được đọc xong
                reader.onload = function (e) {
                    // Tạo một thẻ img để hiển thị ảnh
                    const img = document.createElement('img');
                    img.src = e.target.result;  // Gán nguồn ảnh
                    img.alt = "Image Preview";  // Thêm alt text cho ảnh

                    // Chèn ảnh vào trong div chatInput
                    const chatInput = document.getElementById('chatInput');
                    chatInput.appendChild(img);  // Thêm ảnh vào div

                    // Cuộn đến cuối div để thấy ảnh ngay lập tức
                    chatInput.scrollTop = chatInput.scrollHeight;
                }

                // Đọc file ảnh dưới dạng URL
                reader.readAsDataURL(file);
            }
        });
        function takeSnapshot() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');

            // Đặt kích thước của canvas bằng kích thước video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // Vẽ video lên canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Chuyển canvas thành ảnh Data URL với định dạng JPEG
            const imageDataUrl = canvas.toDataURL('image/jpeg'); // Chuyển ảnh thành JPEG

            // Tạo Blob từ Data URL
            fetch(imageDataUrl)
                .then(res => res.blob())
                .then(blob => {
                    // Tạo URL tạm thời từ Blob
                    const imgUrl = URL.createObjectURL(blob);

                    // Ẩn video sau khi chụp
                    video.style.display = 'none';

                    // Dừng camera
                    const stream = video.srcObject;
                    const tracks = stream.getTracks();
                    tracks.forEach(function (track) {
                        track.stop();
                    });

                    // Hiển thị ảnh trong chatInput
                    const chatInput = document.getElementById('chatInput');
                    const img = document.createElement('img');
                    img.src = imgUrl; // Gán URL của ảnh vào thẻ img

                    // Clear nội dung cũ trong chatInput và thêm ảnh
                    chatInput.innerHTML = ''; // Xóa tất cả nội dung trước
                    chatInput.appendChild(img); // Thêm ảnh vào chatInput
                })
                .catch(error => console.error('Lỗi khi tạo Blob từ Data URL:', error));
        }

    </script>
</body>

</html>