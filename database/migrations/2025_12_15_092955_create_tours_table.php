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
    Schema::create('tours', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('cover_image')->nullable();
        $table->integer('price')->nullable(); // ✅ Tambahkan ini (integer untuk nominal harga)
        $table->string('image_1')->nullable();
        $table->text('desc_1')->nullable();
        $table->string('image_2')->nullable();
        $table->text('desc_2')->nullable();
        $table->string('image_3')->nullable();
        $table->text('desc_3')->nullable();
        $table->string('image_4')->nullable();
        $table->text('desc_4')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
