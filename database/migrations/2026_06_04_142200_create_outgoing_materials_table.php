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
        Schema::create('outgoing_materials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('material_id')
                  ->constrained('materials')
                  ->onDelete('cascade');

            $table->date('tanggal_keluar');
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
        Schema::dropIfExists('outgoing_materials');
    }
};
