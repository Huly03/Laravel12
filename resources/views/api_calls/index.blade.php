<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các API đã gọi</title>
    <!-- Link đến CSS của bạn -->
    <!-- Thêm bất kỳ CSS hoặc link đến CDN ở đây -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Header của bạn -->
        <nav>
            <!-- Navigation bar của bạn, nếu có -->
        </nav>
    </header>

    <div class="content">
        @extends('layouts.app')  <!-- Sử dụng layout chính của bạn -->

        @section('content')
        <h1>Danh sách các API đã gọi</h1>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>API Name</th>
                    <th>User</th>
                    <th>IP Address</th>
                    <th>Timestamp</th>
                    <th>Actions</th>  <!-- Thêm cột Actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($apiCalls as $apiCall)
                <tr>
                    <td>{{ $apiCall->api_name }}</td>
                    <td>{{ $apiCall->user ? $apiCall->user->username : 'N/A' }}</td>  <!-- Hiển thị username của user -->
                    <td>{{ $apiCall->ip_address }}</td>
                    <td>{{ $apiCall->timestamp }}</td>
                    <td>
                        <!-- Nút xóa -->
                        <form action="{{ route('apiCalls.destroy', $apiCall->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?')">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị phân trang -->
        <div class="pagination">
            {{ $apiCalls->links() }}  <!-- Gọi links() để hiển thị phân trang -->
        </div>

        @endsection
    </div>


</body>
</html>
