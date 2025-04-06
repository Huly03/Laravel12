<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa dự án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Chỉnh sửa dự án: {{ $project->name }}</h2>
        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Tên dự án</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
            </div>
            
            <div class="mb-3">
                <label for="project_type" class="form-label">Loại dự án</label>
                <input type="text" class="form-control" id="project_type" name="project_type" value="{{ $project->project_type }}">
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $project->status }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $project->price }}">
            </div>
            
            <div class="mb-3">
                <label for="image_url" class="form-label">Ảnh dự án</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
            </div>
            
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
