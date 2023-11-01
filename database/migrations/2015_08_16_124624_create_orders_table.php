<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('gramature')->nullable();
            $table->unsignedInteger('coresta')->nullable();
            $table->decimal('ukuran', 12, 2);
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->date('date_order')->nullable();
            $table->string('month_order')->nullable(); // Tambahkan kolom 'month_order'
            $table->string('week_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
