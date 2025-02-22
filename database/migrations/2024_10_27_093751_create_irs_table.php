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
        Schema::create('irs', function (Blueprint $table) {
            $table->id('irs_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->char('nim');
            $table->string('nama');
            $table->string('program_studi');
            $table->integer('semester');            
            $table->string('tahun_akademik');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->char('kelas',1);
            $table->integer('sks');
             // Menambahkan kolom hari, jam_mulai, dan jam_selesai
            $table->string('hari', 50)->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->boolean('status')->default(false);
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_persetujuan')->nullable();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};
