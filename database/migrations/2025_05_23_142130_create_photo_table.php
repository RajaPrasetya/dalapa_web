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
        Schema::create('photo', function (Blueprint $table) {
            $table->id('id_photo');
            $table->string('id_workorder', 50);
            $table->string('photo_path');
            $table->enum('type', ['sebelum', 'sesudah', 'lain-lain'])->default('lain-lain');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo');
    }
};
