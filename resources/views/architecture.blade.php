<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phong Cách Kiến Trúc</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Thêm Phong Cách Kiến Trúc</h2>

        <form action="{{ route('architecture') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên Phong Cách Kiến Trúc:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên phong cách" required>
            </div>

            <div class="form-group">
                <label for="image_url">Ảnh:</label>
                <input type="file" id="image_url" name="image_url" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="text_file">Tệp TXT:</label>
                <input type="file" id="text_file" name="text_file" class="form-control-file" accept=".txt" required>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
