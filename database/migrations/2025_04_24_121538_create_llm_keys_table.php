<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_llm_keys_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlmKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tạo bảng llm_keys
        Schema::create('llm_keys', function (Blueprint $table) {
            $table->id();  // Tạo khóa chính cho bảng
            $table->string('llm_name');  // Tên mô hình (OpenAI, Gemini)
            $table->string('api_key');  // API Key
            $table->string('status')->default('inactive');  // Trạng thái (mặc định là 'inactive')
            $table->timestamps();  // Thêm cột timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa bảng llm_keys nếu rollback
        Schema::dropIfExists('llm_keys');
    }
}

