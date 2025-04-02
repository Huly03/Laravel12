<!-- upload.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image for Architecture Style Recognition</title>
</head>
<body>
    <h1>Upload Image for Architecture Style Recognition</h1>
    
    <!-- Form để tải ảnh lên -->
    <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Upload</button>
    </form>

    <!-- Hiển thị kết quả nhận diện (sẽ được điền từ controller) -->
    @if(isset($result))
        <h2>Prediction Results</h2>
        <ul>
            @foreach($result['top_5_labels'] as $index => $label)
                <li>{{ $label }} ({{ number_format($result['top_5_probs'][$index] * 100, 2) }}%)</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
