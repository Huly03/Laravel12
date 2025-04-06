<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('api_calls', function (Blueprint $table) {
        $table->id();
        $table->string('api_name');
        $table->unsignedBigInteger('user_id')->nullable(); // optional, chỉ khi có người dùng
        $table->string('ip_address');
        $table->timestamp('timestamp')->useCurrent();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_calls');
    }
};
