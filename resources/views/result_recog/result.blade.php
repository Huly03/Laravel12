<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recognition Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJwL7cQj23Q6cJ75n0lq8NB06K+9ATQhlX9tDoWi5bhpI7lPOuXZmVfxv52l" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Định dạng bảng */
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        table th {
            background-color: navy;
            color: black;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Các nút (Sửa, Xóa) */
        .btn-warning, .btn-danger {
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

        /* Định dạng footer */
        footer {
            background-color: #000;
            color: rgb(255, 255, 255);
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
            color: rgb(179, 185, 129);
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color: rgb(177, 188, 137);
        }

        .social-icons {
            display: flex;
            justify-content: start;
            gap: 10px;
            margin-top: 10px;
        }

        .social-icons a {
            font-size: 20px;
            color: rgb(179, 185, 129);
            text-decoration: none;
        }

        .social-icons a:hover {
            color: rgb(169, 188, 99);
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Style</th>
                            <th>Detectione Time</th>
                            <th>ID_User</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                            <tr>
        
                                <td>
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->style }}" style="height: 100px; object-fit: cover;">
                                </td>
                                <td>{{ $image->style }}</td>
                                <td>{{ $image->detection_time }}</td>
                                <td>{{ $image->id_user }}</td>
                                <td>{{ $image->created_at }}</td>
                                <td>{{ $image->updated_at }}</td>
                                <!-- <td>
                                    <a href="{{ route('editImage', $image->id) }}" class="btn btn-warning">Sửa</a>
                                
                                    <form action="{{ route('deleteImage', $image->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">Xóa</button>
                                    </form>
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FQhCsm6BcXmQ8jdxErKrRDN4JbtaJFeIq0m5pHnxVg2Q3nz6aVr0D2XfK6ktDoKN"
        crossorigin="anonymous">
    </script>
</body>

</html>
