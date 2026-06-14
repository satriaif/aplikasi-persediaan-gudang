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
        Schema::create('incoming_materials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('material_id')
                  ->constrained('materials')
                  ->onDelete('cascade');

            $table->date('tanggal_masuk');
            $table->integer('jumlah');
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_materials');
    }
};
