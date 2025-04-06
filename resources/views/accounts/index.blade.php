@extends('layouts.app')

@section('content')
    <h1 style="text-align:center; font-size: 2rem; font-weight: bold; margin-bottom: 20px; color: #333;">Quản lý Tài Khoản</h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #343a40; color: white;">
            <tr>
                <th style="padding: 10px; text-align: center;">Username</th>
                <th style="padding: 10px; text-align: center;">Email</th>
                <th style="padding: 10px; text-align: center;">Phone</th>
                <th style="padding: 10px; text-align: center;">Gender</th>
                <th style="padding: 10px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr id="account-{{ $account->id }}" style="background-color: #f9f9f9; text-align: center;">
                    <td style="padding: 10px;">{{ $account->username }}</td>
                    <td style="padding: 10px;">{{ $account->email }}</td>
                    <td style="padding: 10px;">{{ $account->phone }}</td>
                    <td style="padding: 10px;">{{ $account->gender == 1 ? 'Male' : 'Female' }}</td>
                    <td style="padding: 10px;">
                        <!-- Nút chỉnh sửa chuyển sang form chỉnh sửa -->
                        <a href="{{ route('accounts.edit', $account) }}" style="text-decoration: none; padding: 8px 15px; background-color: #ffc107; color: white; border-radius: 5px; margin-right: 10px;">Chỉnh sửa</a>

                        <!-- Nút xóa -->
                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px 15px; background-color: #dc3545; color: white; border-radius: 5px; border: none;" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
