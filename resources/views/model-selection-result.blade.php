<!-- resources/views/model-selection-result.blade.php -->
@if(isset($data['status']) && $data['status'] == 'success')
    <h3>Mô hình đã được khởi tạo thành công!</h3>
    <p>Thông báo: {{ $data['message'] }}</p>
@else
    <h3>Đã có lỗi xảy ra!</h3>
    <p>Thông báo lỗi: {{ $data['error'] }}</p>
@endif
