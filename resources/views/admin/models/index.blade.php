<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Architecture Models</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<x-header/>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl mb-4">Quản lý Architecture Models</h2>

        <!-- Form thêm model -->
        <form action="{{ route('models.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <div class="flex space-x-4">
                <!-- Tên Model -->
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Model Name</label>
                    <input type="text" id="name" name="name" placeholder="" class="border p-2 flex-1" required>
                </div>

                <!-- Chọn File .txt chứa tên phong cách kiến trúc -->
                <div class="flex-1">
                    <label for="train_name" class="block text-sm font-medium text-gray-700">Chọn file chứa tên phong cách kiến trúc</label>
                    <input type="file" id="train_name" name="train_name" accept=".txt" class="border p-2" required>
                    <input type="text" id="trainNameFilePathTextbox" class="border p-2 mt-2" readonly> <!-- Textbox hiển thị tên file -->
                </div>

                <!-- Chọn File Model -->
                <div class="flex-1">
                    <label for="model_file" class="block text-sm font-medium text-gray-700">File model</label>
                    <input type="file" id="model_file" name="model_file" class="border p-2" required>
                    <input type="text" id="modelFilePathTextbox" class="border p-2 mt-2" readonly> <!-- Textbox hiển thị tên file -->
                </div>

                <!-- Nút Submit -->
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 rounded">Thêm</button>
                </div>
            </div>
        </form>

        <!-- Bảng danh sách -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Architectures</th>
                    <th class="px-4 py-2">Model</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $i => $m)
                    <tr class="{{ $m->is_active ? 'bg-green-50' : '' }}">
                        <td class="border px-4 py-2">{{ $i + 1 }}</td>
                        <td class="border px-4 py-2">{{ $m->name }}</td>
                        <td class="border px-4 py-2 text-sm">{{$m->name_train }}</td>
                        <td class="border px-4 py-2 text-sm">{{ $m->model_path }}</td>
                        <td class="border px-4 py-2">
                            @if($m->is_active)
                                <span class="text-green-600 font-semibold">Active</span>
                            @else
                                <span class="text-gray-500">—</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-1">
                            {{-- Sửa tên model (inline edit) --}}
                            <form action="{{ route('models.update', $m->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                               
                                <button class="text-blue-600">💾</button>
                            </form>

                            {{-- Xóa --}}
                            <form action="{{ route('models.destroy', $m->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Xác nhận xóa?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">🗑️</button>
                            </form>

                            {{-- Sử dụng --}}
                            @unless($m->is_active)
                                <form action="{{ route('models.use', $m->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="text-green-600">✅</button>
                                </form>
                            @endunless
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Lấy phần tử input và phần tử hiển thị đường dẫn cho architecture file và model file
        const architectureFileInput = document.getElementById('train_name');
        const modelFileInput = document.getElementById('model_file');
        const architectureFilePathTextbox = document.getElementById('trainNameFilePathTextbox');
        const modelFilePathTextbox = document.getElementById('modelFilePathTextbox');

        // Lắng nghe sự kiện khi chọn file cho architecture_file
        architectureFileInput.addEventListener('change', function () {
            const file = architectureFileInput.files[0];
            if (file) {
                const filePath = file.name; // Lấy tên file
                architectureFilePathTextbox.value = filePath; // Hiển thị tên file trong textbox
            }
        });

        // Lắng nghe sự kiện khi chọn file cho model_file
        modelFileInput.addEventListener('change', function () {
            const file = modelFileInput.files[0];
            if (file) {
                const filePath = file.name; // Lấy tên file
                modelFilePathTextbox.value = filePath; // Hiển thị tên file trong textbox
            }
        });
    </script>

</body>

</html>
