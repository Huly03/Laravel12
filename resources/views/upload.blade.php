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
    </style>
</head>

<body>
    <div>
        <x-header />
        <!-- Giao diện chính -->
        <div class="container">
            <!-- Phần Nhận diện Kiến trúc -->
            <div class="left-panel">
                <h1>Nhận diện phong cách kiến trúc</h1>
                <form id="uploadForm" enctype="multipart/form-data">
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

    <script>
// Upload form AJAX request
        // Upload form AJAX request
        $('#uploadForm').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            // Gửi yêu cầu tới Flask API trực tiếp để nhận diện phong cách kiến trúc
            $.ajax({
                url: 'http://127.0.0.1:5000/api/detect',  // Gọi trực tiếp Flask API
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Response from Flask: ", response);  // Kiểm tra kết quả từ Flask

                    // Kiểm tra nếu kết quả nhận diện trả về đúng
                    if (response.top_5_labels && response.top_5_labels.length > 0) {
                        // Hiển thị ảnh nhận diện được
                        $('#uploadedImage').attr('src', URL.createObjectURL($('#image')[0].files[0]));
                        $('#uploadedImageContainer').show();

                        const results = response.top_5_labels;
                        const probabilities = response.top_5_probs;

                        // Hiển thị kết quả nhận diện trong danh sách
                        $('#resultsList').empty();
                        results.forEach(function (label, index) {
                            $('#resultsList').append('<li>' + label + ' (' + (probabilities[index] * 100).toFixed(2) + '%)</li>');
                        });

                        // Lấy phong cách kiến trúc cao nhất
                        const topStyle = results[0];
                        if (topStyle) {
                            const chatbotPrompt = "Thông tin về phong cách kiến trúc " + topStyle;

                            // Hiển thị tin nhắn người dùng tự động
                            $('#chatbox').append('<div class="chat-message user">' + chatbotPrompt + '</div>');

                            // Gửi yêu cầu tới chatbot Flask
                            $.ajax({
                                url: 'http://127.0.0.1:5000/api/chatbot',
                                type: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify({ "user_input": chatbotPrompt }),
                                success: function (chatbotResponse) {
                                    // Hiển thị phản hồi từ chatbot
                                    const formattedResponse = '<div class="chat-message bot markdown-body">' + chatbotResponse.response + '</div>';
                                    $('#chatbox').append(formattedResponse);
                                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Cuộn xuống cuối chatbox
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error:", error);
                                    alert('Lỗi khi gửi sang chatbot: ' + error);
                                }
                            });
                        }
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