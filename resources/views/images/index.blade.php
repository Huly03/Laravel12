@extends('layouts.app')

@section('content')
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
@endsection

@push('styles')
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
@endpush
