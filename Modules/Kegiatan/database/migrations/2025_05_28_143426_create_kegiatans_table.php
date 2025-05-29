<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up() : void
  {
    Schema::create('kegiatans', function (Blueprint $table) {
      $table->id();
      $table->string('nama_kegiatan');
      $table->string('img')->nullable();
      $table->string('keterangan')->nullable();
      $table->date('tanggal_kegiatan')->nullable();
      $table->date('jumlah_perserta')->nullable();

      $table->string('created_by')->default('unknown');
      $table->string('updated_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('kegiatans');
  }
};
