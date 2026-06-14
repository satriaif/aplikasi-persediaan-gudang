<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('incoming_materials', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('material_id')
                  ->constrained('users')
                  ->onDelete('cascade');
        });

        Schema::table('outgoing_materials', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('material_id')
                  ->constrained('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('incoming_materials', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('outgoing_materials', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};