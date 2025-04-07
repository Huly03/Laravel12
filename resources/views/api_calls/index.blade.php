@extends('layouts.app')  <!-- Nếu bạn có layout chính, thay 'layouts.app' bằng layout của bạn -->

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
