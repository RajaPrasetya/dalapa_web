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
        Schema::create('workorder_material', function (Blueprint $table) {
            $table->string('id_workorder', 50);
            $table->string('id_material', 16);
            $table->integer('qty_used')->default(1);
            $table->decimal('total_price', 12, 2)->default(0.00);
            $table->timestamps();
            
            $table->primary(['id_workorder', 'id_material']);
            // Foreign keys
            $table->foreign('id_workorder')->references('id_workorder')->on('work_order')->onDelete('cascade');
            $table->foreign('id_material')->references('id_material')->on('material')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorder_material');
    }
};
