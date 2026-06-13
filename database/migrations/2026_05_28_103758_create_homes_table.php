<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable(); // Untuk Edit Foto
            $table->string('background')->nullable(); // Untuk Edit Background
            $table->text('about')->nullable(); // Untuk Edit Catatan Saya
            $table->string('cv_link')->nullable(); // Untuk Edit CV
            $table->string('contact_link')->nullable(); // Untuk Edit Button Hubungi Saya
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};