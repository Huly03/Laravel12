<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tài Khoản</title>

    <!-- Link đến CSS của bạn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJwL7cQj23Q6cJ75n0lq8NB06K+9ATQhlX9tDoWi5bhpI7lPOuXZmVfxv52l" crossorigin="anonymous">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .modal {
z-index: 1050; /* Đảm bảo modal ở trên tất cả các phần tử khác */
    position: fixed; /* Đảm bảo modal không bị lệch khi cuộn trang */
          /* Ensure modals are on top */
        }

        .modal-dialog {
            max-width: 800px;
            /* Adjust size of the modal */
            margin: 30px auto;
            /* Center modal on screen */
        }

        .modal-content {
            border-radius: 10px;
            /* Add rounded corners */
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

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #007bff;
            color: black;
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

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-responsive {
            margin-top: 20px;
        }

        /* Footer styles */
        footer {
            background-color: #007bff;
            color: white;
            padding: 0px 15px;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: -50px;
            z-index: 1000; 
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }

        /* Button styles */
        .btn-edit,
        .btn-delete {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <x-header />
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
                            <th>Hành động</th>
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
                                <td>
                                    <!-- Thêm nút Chỉnh sửa và Xóa -->
                                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $u->id }}">Chỉnh sửa</button>
                                    <form action="{{ route('deleteUser', $u->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete"
                                            onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $u->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $u->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $u->id }}">Chỉnh sửa tài khoản</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateUser', $u->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username"
                                                        value="{{ $u->username }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ $u->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fullname" class="form-label">Họ tên</label>
                                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                                        value="{{ $u->fullname }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="level" class="form-label">Level</label>
                                                    <input type="text" class="form-control" id="level" name="level"
                                                        value="{{ $u->level }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Trạng thái</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="1" {{ $u->status == '1' ? 'selected' : '' }}>Hoạt động
                                                        </option>
                                                        <option value="0" {{ $u->status == '0' ? 'selected' : '' }}>Khóa
                                                        </option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FQhCsm6BcXmQ8jdxErKrRDN4JbtaJFeIq0m5pHnxVg2Q3nz6aVr0D2XfK6ktDoKN"
        crossorigin="anonymous"></script>
</body>

</html>