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
<<<<<<< HEAD
      $table->string('nama_kegiatan')->nullable();
      $table->string('img')->nullable();
      $table->string('desc')->nullable();
      $table->date('tgl_kegiatan')->nullable();
=======
      $table->string('nama_kegiatan');
      $table->string('img')->nullable();
      $table->string('keterangan')->nullable();
      $table->date('tanggal_kegiatan')->nullable();
      $table->date('jumlah_perserta')->nullable();
>>>>>>> 5d15b36f47ef02e609cf60f8dc11da0e971e2c7e

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
