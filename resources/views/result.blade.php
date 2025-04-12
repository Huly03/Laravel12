<!-- result.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architecture Style Recognition Results</title>
</head>
<body>
    <h1>Architecture Style Recognition Results</h1>

    <!-- Hiển thị các nhãn và xác suất của top 5 phong cách kiến trúc -->
    @if(isset($result) && count($result['top_5_labels']) > 0)
        <h2>Top 5 Architecture Styles:</h2>
        <ul>
            @foreach($result['top_5_labels'] as $index => $label)
                <li>{{ $label }} ({{ number_format($result['top_5_probs'][$index] * 100, 2) }}%)</li>
            @endforeach
        </ul>
    @else
        <p>No result available. Please try again.</p>
    @endif

    <br><a href="{{ url('/upload') }}">Back to Upload</a>
</body>
</html>