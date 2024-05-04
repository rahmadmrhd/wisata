<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('tempat_wisatas', function (Blueprint $table) {
      $table->id();
      $table->string('kode')->unique();
      $table->string('nama');
      $table->year('tahun_buka');
      $table->integer('harga_tiket');
      $table->time('jam_buka');
      $table->time('jam_tutup');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('tempat_wisatas');
  }
};
