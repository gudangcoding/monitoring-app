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
        Schema::disableForeignKeyConstraints();

        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('Siswas');
            $table->foreignId('mata_pelajaran_id')->constrained('MataPelajarans');
            $table->integer('nilai_tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->foreignId('tahun_ajaran_id')->constrained('TahunAjarans');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
