<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tài Khoản</title>

    <!-- Link đến CSS của bạn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJwL7cQj23Q6cJ75n0lq8NB06K+9ATQhlX9tDoWi5bhpI7lPOuXZmVfxv52l" crossorigin="anonymous">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .content {
            margin-top: 50px;
        }

        .container {
            max-width: 1200px;
        }

        h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #007bff;
        }

        table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #e1f5fe;
            cursor: pointer;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-responsive {
            margin-top: 20px;
        }

        /* Footer styles */
        footer {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }

    </style>
</head>
<body>

    <div class="content">
        <!-- Nội dung chính từ view -->
        <div class="container mt-4">
            <h2 class="text-center text-primary mb-4">Danh sách tất cả tài khoản</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Họ tên</th>
                            <th>Level</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->fullname }}</td>
                                <td>{{ $u->level }}</td>
                                <td>{{ $u->status == '1' ? 'Hoạt động' : 'Khóa' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Website của bạn. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-FQhCsm6BcXmQ8jdxErKrRDN4JbtaJFeIq0m5pHnxVg2Q3nz6aVr0D2XfK6ktDoKN" crossorigin="anonymous"></script>
</body>
</html>
