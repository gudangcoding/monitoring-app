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

        Schema::create('absensi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensi_id')->constrained('Absensis');
            $table->foreignId('siswa_id')->constrained('Siswas');
            $table->enum('hadir', ["true","false"]);
            $table->enum('alfa', ["true","false"]);
            $table->enum('sakit', ["true","false"]);
            $table->enum('izin', ["true","false"]);
            $table->string('keterangan');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_details');
    }
};
