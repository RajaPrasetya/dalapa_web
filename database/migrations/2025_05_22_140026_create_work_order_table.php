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
        Schema::create('work_order', function (Blueprint $table) {
            $table->string('id_workorder', 50)->primary();
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
            $table->text('deskripsi')->nullable();
            $table->enum('segmen', ['feeder', 'distribusi'])->nullable();
            $table->unsignedBigInteger('created_by'); // FK to users or another table, int type
            $table->unsignedBigInteger('assigned_to')->nullable(); // FK to users or another table, int type
            $table->string('id_tiket', 16)->nullable(); // FK to tiket_gangguan
            $table->timestamps();

            // Foreign keys (adjust referenced tables/columns as needed)
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('id_tiket')->references('id_tiket')->on('tiket_gangguan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order');
    }
};
