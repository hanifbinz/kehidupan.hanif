<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Dokumentasi
            $table->string('media_file'); // File Foto/Video
            $table->text('description')->nullable(); // Keterangan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentations');
    }
};