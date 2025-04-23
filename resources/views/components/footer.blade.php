<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <!-- Liên kết CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome để sử dụng các biểu tượng mạng xã hội -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Footer styling */
        footer {
            background-color: #000;
            color:rgb(255, 255, 255);
            padding: 40px 0;
            font-size: 14px;
            z-index: 9999; 
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            width: 30%;
            margin-bottom: 20px;
        }

        .footer-section h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-section a {
            color:rgb(179, 185, 129);
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color:rgb(177, 188, 137);
        }

        /* Social icons styling */
        .social-icons {
            display: flex;
            justify-content: start; /* Align icons horizontally */
            gap: 10px; /* Add space between icons */
            margin-top: 10px;
        }

        .social-icons a {
            font-size: 20px;
            color: rgb(179, 185, 129); /* Default icon color */
            text-decoration: none;
        }

        /* Hover effect for social icons */
        .social-icons a:hover {
            color: rgb(169, 188, 99); /* Hover color */
        }

        .feedback {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color:rgb(0, 0, 0);
            color: white;
            padding: 10px;
            border-radius: 50%;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }

        .feedback:hover {
            background-color:rgb(199, 202, 163);
        }
    </style>
</head>
<body>

<!-- Footer -->
<!-- <footer>
    <div class="container footer-container">
   
        <div class="footer-section">
            <h5>Công ty</h5>
            <a href="#">Công Ty TNHH Một Thành Viên Công Nghệ Kỹ Thuật Tiên Phong</a>
        </div>

       
        <div class="footer-section">
            <h5>Địa chỉ</h5>
            <a href="#">Số B16, đường số 08, khu dân cư Công Ty 8, Phường Phú Thứ, Quận Cái Răng, Thành phố Cần Thơ</a>
        </div>

        <div class="footer-section">
            <h5>Liên hệ</h5>
            <a href="#">0353220302</a>

           
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook-f"></a>
                <a href="https://www.instagram.com/" target="_blank" class="fab fa-instagram"></a>
                <a href="https://www.linkedin.com/" target="_blank" class="fab fa-linkedin-in"></a>
                <a href="https://www.twitter.com/" target="_blank" class="fab fa-twitter"></a>
                <a href="https://www.youtube.com/" target="_blank" class="fab fa-youtube"></a>
            </div>
        </div>
    </div>
</footer> -->

<!-- Feedback Button -->
<!-- <div class="feedback">
    <span>Feedback</span>
</div> -->

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
