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
        $table->foreignId('user_id')->nullable()->constrained('accounts')->onDelete('set null');
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
