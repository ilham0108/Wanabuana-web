<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 50)->unique();
            $table->string('nama_lengkap', 50);
            $table->string('nama_panggilan', 20);
            $table->string('handphone', 13);
            $table->date('tanggal_lahir', 20);
            $table->string('fakultas', 20);
            $table->string('program_studi', 50);
            $table->string('surat_sehat', 100);
            $table->string('surat_izin_orang_tua', 100);
            $table->string('foto', 100);
            $table->string('bukti_pembayaran', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment');
    }
}
