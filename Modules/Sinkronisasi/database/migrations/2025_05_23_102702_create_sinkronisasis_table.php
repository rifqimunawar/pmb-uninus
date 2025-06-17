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
    Schema::create('sinkronisasis', function (Blueprint $table) {
      $table->id();

      $table->string('fakultas');
      $table->string('prodi');
      $table->integer('pelayanan_online')->nullable();
      $table->integer('pelayanan_offline')->nullable();
      $table->integer('pendaftar')->nullable();
      $table->integer('bayar_form_reguler')->nullable();
      $table->integer('bayar_form_rpl')->nullable();
      $table->integer('bayar_form_karyawan')->nullable();
      $table->integer('bayar_form_kipk')->nullable();
      $table->integer('nim')->nullable();
      $table->integer('bayar_ukt_reguler')->nullable();
      $table->integer('bayar_ukt_rpl')->nullable();
      $table->integer('bayar_ukt_karyawan')->nullable();
      $table->integer('angkatan')->nullable();
      $table->string('jenjang')->nullable();

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
    Schema::dropIfExists('sinkronisasis');
  }
};
