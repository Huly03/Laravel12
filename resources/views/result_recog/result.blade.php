<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Ảnh</title>

    <!-- Add your CSS file or link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJwL7cQj23Q6cJ75n0lq8NB06K+9ATQhlX9tDoWi5bhpI7lPOuXZmVfxv52l" crossorigin="anonymous">
    <style>
        .container {
            max-width: 1200px;
            margin-top: 30px;
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

        .row-cols-md-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .text-center {
            text-align: center;
        }

        .g-4 {
            gap: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <!-- Header content goes here -->
    </header>

    <div class="content">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Danh sách ảnh của bạn</h2>

            @if($images->isEmpty())
                <p class="text-center">Bạn chưa tải lên bất kỳ ảnh nào.</p>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($images as $image)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="{{ $image->style }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->style }}</h5>
                                    <p class="card-text">{{ $image->style }}</p>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('editImage', $image->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('deleteImage', $image->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">Xóa</button>
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

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-FQhCsm6BcXmQ8jdxErKrRDN4JbtaJFeIq0m5pHnxVg2Q3nz6aVr0D2XfK6ktDoKN" crossorigin="anonymous"></script>
</body>
</html>
