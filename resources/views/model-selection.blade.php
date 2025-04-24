<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Mô Hình LLM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        button {
            padding: 10px 20px;
            background-color:navy;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: navy;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        table th {
            background-color:navy;
            color: white;
        }

        table td {
            background-color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 8px 12px;
            margin-right: 10px;
            color: #fff;
            border-radius: 4px;
        }

        a:hover {
            opacity: 0.8;
        }

        .use-btn {
            background-color:navy;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .use-btn:hover {
            background-color: navy;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        /* Thêm khoảng cách giữa các nút */
        td a {
            margin-right: 10px;
            display: inline-block;
        }

        /* Màu sắc cho trạng thái */
        .status-active {
             /* Màu xanh lá cho active */
            color: green;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .status-inactive {
             /* Màu đỏ cho inactive */
            color: red;
            padding: 5px 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <!-- Form nhập thông tin -->
    <form action="/model-selection" method="POST">
        @csrf

        <label for="llm_name">Chọn LLM Name:</label>
        <select id="llm_name" name="llm_name" required>
            <option value="openai">OpenAI</option>
            <option value="gemini">Gemini</option>
        </select>
        
        <label for="key_api">Nhập KEY API:</label>
        <input type="text" id="key_api" name="key_api" required>

        <button type="submit">Gửi</button>
    </form>

    <h2>Danh sách các mô hình</h2>
    <table>
        <thead>
            <tr>
                <th>Tên mô hình</th>
                <th>API Key</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($llmKeys as $key)
                <tr>
                    <td>{{ $key->llm_name }}</td>
                    <td>{{ $key->api_key }}</td>
                    <td class="{{ $key->status === 'active' ? 'status-active' : 'status-inactive' }}">
                        {{ $key->status }}
                    </td>
                    <td>
                        <!-- Nút Sử dụng: Chỉ hiển thị khi trạng thái là inactive -->
                        @if($key->status !== 'active')
                            <a href="{{ route('useModel', $key->id) }}" class="use-btn">Sử dụng</a>
                        @endif

                        <!-- Nút Xóa -->
                        <a href="{{ route('deleteModel', $key->id) }}" class="delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa mô hình này?')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
