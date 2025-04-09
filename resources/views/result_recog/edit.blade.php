@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center text-primary mb-4">Sửa ảnh</h2>

        <form action="{{ route('updateImage', $image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Hiển thị ảnh hiện tại nếu có -->
            @if($image->image)
                <div class="form-group mb-4">
                    <label for="current_image">Ảnh hiện tại:</label>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Current Image" class="img-fluid rounded" style="max-height: 300px; border: 2px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                </div>
            @endif

            <div class="form-group mb-4">
                <label for="style" class="font-weight-bold">Phong cách kiến trúc:</label>
                <input type="text" name="style" id="style" class="form-control form-control-lg" value="{{ $image->style }}" required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg px-5">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .container {
            max-width: 600px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 5px;
            font-size: 1.1rem;
        }

        label {
            font-size: 1.1rem;
            color: #555;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-size: 1.1rem;
            padding: 10px 20px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .img-fluid {
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .text-primary {
            color: #007bff !important;
        }

        .text-center {
            text-align: center;
        }
    </style>
@endpush
