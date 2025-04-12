@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách tất cả tài khoản</h2>
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
@endsection
