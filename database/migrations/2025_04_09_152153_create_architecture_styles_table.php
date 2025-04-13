<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectureStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architecture_styles', function (Blueprint $table) {
            $table->id();  // Trường id tự tăng
            $table->longText('image');  // Trường dữ liệu ảnh (BLOB)
            $table->string('style');  // Phong cách kiến trúc nhận diện
            $table->timestamp('detection_time')->useCurrent();  // Thời gian nhận diện
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');  // Khóa ngoại liên kết với bảng users
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('architecture_styles');
    }
}
