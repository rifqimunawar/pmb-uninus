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
    Schema::create('report_umums', function (Blueprint $table) {
      $table->id();

      // Kolom dari data JSON
      $table->string('fakultas');
      $table->string('prodi');
      $table->integer('pelayanan_online')->default(0);
      $table->integer('pelayanan_offline')->default(0);
      $table->integer('pendaftar')->default(0);
      $table->integer('bayar_form_reguler')->default(0);
      $table->integer('bayar_form_rpl')->default(0);
      $table->integer('bayar_form_karyawan')->default(0);
      $table->integer('bayar_form_kipk')->default(0);
      $table->integer('nim')->default(0);
      $table->integer('bayar_ukt_reguler')->default(0);
      $table->integer('bayar_ukt_rpl')->default(0);
      $table->integer('bayar_ukt_karyawan')->default(0);

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
    Schema::dropIfExists('report_umums');
  }
};
