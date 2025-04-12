@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tài khoản của tôi</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('my.account.update') }}">
        @csrf

        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" name="fullname" class="form-control" value="{{ old('fullname', $user->fullname) }}">
        </div>

        <div class="mb-3">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control" value="{{ old('sdt', $user->sdt) }}">
        </div>

        <div class="mb-3">
            <label>Địa chỉ</label>
            <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi', $user->dia_chi) }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
