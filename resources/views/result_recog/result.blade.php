<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Ảnh</title>

    <!-- Add your CSS file or link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJwL7cQj23Q6cJ75n0lq8NB06K+9ATQhlX9tDoWi5bhpI7lPOuXZmVfxv52l" crossorigin="anonymous">
    <style>
        /* Đảm bảo container chiếm toàn bộ chiều rộng */
        /* Đảm bảo container chiếm toàn bộ chiều rộng */
        .container {
            width: 100%;
            /* Chiếm toàn bộ chiều rộng */
            padding: 0;
            /* Loại bỏ padding mặc định của container */
            margin-top: 30px;
            display: flex;
            /* Dùng flexbox để căn giữa */
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            flex-direction: column;
            /* Đảm bảo các phần tử trong container xếp theo chiều dọc */
        }

        /* Căn giữa nội dung trong row */
        .row {
            display: flex;
            justify-content: center;
            /* Căn giữa các thẻ card theo chiều ngang */
            flex-wrap: wrap;
            /* Cho phép các thẻ card xuống dòng khi không đủ không gian */
        }

        /* Điều chỉnh độ rộng của từng thẻ card */
        .col {
            display: flex;
            justify-content: center;
        }


        .card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
        }

        .card-text {
            font-size: 0.95rem;
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

        /* Lưới hình ảnh - sử dụng Bootstrap Grid */
        .row-cols-md-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        /* Khi màn hình nhỏ hơn, giảm số cột */
        @media (max-width: 1200px) {
            .row-cols-md-4 {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 992px) {
            .row-cols-md-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .row-cols-md-4 {
                grid-template-columns: repeat(1, 1fr);
                /* Chỉ hiển thị 1 cột trên màn hình nhỏ */
            }
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #000;
            color:rgb(255, 255, 255);
            padding: 40px 0;
            font-size: 14px;
            z-index: 9999; 
        }

        .footer-container {
            display: flex;
            justify-content: center;
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
    </style>
</head>
<body>
    <x-header />
    <div class="content">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Danh sách ảnh kết quả</h2>

            @if($images->isEmpty())
                <p class="text-center">Bạn chưa tải lên bất kỳ ảnh nào.</p>
            @else
                <div class="row row-cols-1 row-cols-md-4 g-4"> <!-- Cập nhật với 4 cột ngang -->
                    @foreach($images as $image)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top"
                                    alt="{{ $image->style }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->style }}</h5>
                                    <p class="card-text">{{ $image->style }}</p>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('editImage', $image->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('deleteImage', $image->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">Xóa</button>
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
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FQhCsm6BcXmQ8jdxErKrRDN4JbtaJFeIq0m5pHnxVg2Q3nz6aVr0D2XfK6ktDoKN"
        crossorigin="anonymous">
    </script>
   
</body>
</html>

