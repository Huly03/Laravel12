<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architecture Style Recognition</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Đảm bảo body có đủ chiều cao */
        }

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
            /* Sidebar hidden by default */
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

        /* Sidebar toggle buttons */
        .toggle-btn {
            background-color: #1f2a3f;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

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

        .left-panel,
        .right-panel {
            width: 48%;
            /* Chia đôi không gian */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Giao diện Upload Ảnh */
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #chatbox {
            height: 350px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        #chatInput {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        #sendChatBtn {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #sendChatBtn:hover {
            background-color: #4cae4c;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .upload-btn,
        .chat-btn {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            border: none;
            margin-top: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .upload-btn:hover,
        .chat-btn:hover {
            background-color: #0056b3;
        }

        /* Thanh tìm kiếm */
        #searchContainer {
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        #searchInput {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
            margin-right: 10px;
        }

        #searchBtn {
            padding: 10px 15px;
            background-color: #5bc0de;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        #searchBtn:hover {
            background-color: #31b0d5;
        }

        /* Tin nhắn người dùng */
        .chat-message.user {
            background-color: #d1e7dd;
            color: #495057;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-end;
            /* Đẩy tin nhắn người dùng sang bên phải */
            text-align: right;
        }

        /* Tin nhắn của chatbot */
        .chat-message.bot {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-start;
            /* Đẩy tin nhắn chatbot sang bên trái */
            text-align: left;
        }

        /* Thêm các dấu chấm hoặc dấu hiệu phân biệt rõ ràng */
        .chat-message {
            margin: 5px;
            word-wrap: break-word;
            display: inline-block;
        }

        .container {
            position: relative;
            /* To position toggle buttons within it */
        }

        /* Position toggle buttons */
        .open-btn,
        .close-btn {
            position: absolute;
            top: -15px;
            left: -30px;
            z-index: 1;
            /* Ensure the button is above content */
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
            /* Sidebar hidden by default */
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

        /* Sidebar toggle buttons */
        .toggle-btn {
            background-color: #1f2a3f;
            color: white;
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
        <div class="container">
            <button class="toggle-btn open-btn" id="open-btn">
                <i class="fas fa-bars"></i>
            </button>
            <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
                <i class="fas fa-times"></i>
            </button>
            <!-- Phần Nhận diện Kiến trúc -->
            <div class="left-panel">
                <h1>Nhận diện phong cách kiến trúc</h1>
                <form id="uploadForm" action="{{ route('uploadImage', ['id' => $user_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="image">Chọn ảnh cần nhận diện:</label><br>
                    <input type="file" name="image" id="image" required><br><br>
                    <button type="submit" class="upload-btn">Tiến hành nhận diện</button>
                </form>

                <div id="uploadedImageContainer" style="display:none;">
                    <h2>Nhận diện hoàn tất</h2>
                    <img id="uploadedImage" src="" alt="Uploaded Image">
                    <h3>Kết quả</h3>
                    <ul id="resultsList"></ul>
                </div>
            </div>

            <!-- Phần Chatbot -->
            <div class="right-panel">
                <h1>Mô tả</h1>

                <!-- Thanh tìm kiếm phía trên Chatbot -->
                <div id="searchContainer">

                    <input type="text" id="searchInput" class="form-control"
                        placeholder="Tìm kiếm phong cách kiến trúc..." />
                    <button id="searchBtn">Tìm kiếm</button>
                </div>

                <div id="chatbox">
                    <!-- Chat messages will appear here -->
                </div>

                <input type="text" id="chatInput" placeholder="Ask me anything..." />
                <button id="sendChatBtn" class="chat-btn">Gửi</button>
            </div>
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

    </script>

    <script>
$('#uploadForm').on('submit', function (event) {
    event.preventDefault();  // Prevent default form submission
    var formData = new FormData(this);  // Get form data

    // Send image to the controller via AJAX
    $.ajax({
        url: '{{ route("uploadImage", ["id" => $user_id]) }}', // POST request to controller
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log("Response from server: ", response);
            if (response.result) {
                // Hiển thị ảnh và kết quả nhận diện
                $('#uploadedImage').attr('src', '/storage/' + response.imagePath);
                $('#uploadedImageContainer').show();
                $('#resultsList').empty();

                // Hiển thị top 5 kết quả nhận diện từ Flask
                response.result.top_5_labels.forEach(function(label, index) {
                    $('#resultsList').append('<li>' + label + ' (' + (response.result.top_5_probs[index] * 100).toFixed(2) + '%)</li>');
                });

                // Gửi kết quả top1 vào chatbot
                const top1 = response.result.top_5_labels[0];  // top1 là phong cách kiến trúc có xác suất cao nhất
                sendToChatbot(top1);  // Gửi top1 vào chatbot
            } else {
                alert('Không có kết quả nhận diện hợp lệ từ Flask');
            }
        },
        error: function (xhr, status, error) {
            console.error("Upload error:", error);
            alert('Lỗi khi nhận diện hình ảnh: ' + error);
        }
    });
});

// Hàm gửi kết quả top1 vào chatbot
function sendToChatbot(top1) {
    // Hiển thị tin nhắn của người dùng trong chatbox
    $('#chatbox').append('<div class="chat-message user">Thông tin về phong cách kiến trúc ' + top1 + '</div>');
    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox để thấy tin nhắn

    // Gửi yêu cầu đến chatbot API
    $.ajax({
        url: 'http://127.0.0.1:5000/api/chatbot',  // API chatbot của bạn
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            "user_input": "Thông tin về phong cách kiến trúc " + top1,
            "language": "vi"
        }),
        success: function (chatbotResponse) {
            console.log("Chatbot response:", chatbotResponse);
            // Hiển thị phản hồi từ chatbot
            $('#chatbox').append('<div class="chat-message bot markdown-body">' + chatbotResponse.response + '</div>');
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
        }
    });
}


        // Chatbot response handling
        $('#sendChatBtn').on('click', function (event) {
            event.preventDefault();
            var userMessage = $('#chatInput').val();
            if (userMessage.trim() === "") return;

            // Thêm tin nhắn của người dùng vào chatbox
            $('#chatbox').append('<div class="chat-message user">' + userMessage + '</div>');
            $('#chatInput').val('');  // Xóa nội dung trong input

            // Gửi yêu cầu tới chatbot
            $.ajax({
                url: 'http://127.0.0.1:5000/api/chatbot',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ "user_input": userMessage }),
                success: function (response) {
                    const formattedResponse = '<div class="chat-message bot markdown-body">' + response.response + '</div>';
                    $('#chatbox').append(formattedResponse);
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert('An error occurred with the chatbot: ' + error);
                }
            });
        });

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
    </script>
</body>

</html>