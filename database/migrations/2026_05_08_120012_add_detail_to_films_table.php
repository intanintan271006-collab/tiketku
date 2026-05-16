<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('films', function (Blueprint $table) {

            $table->string('genre')->nullable();
            $table->float('rating')->nullable();
            $table->text('sinopsis')->nullable();
            $table->string('trailer')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {

            $table->dropColumn([
                'genre',
                'rating',
                'sinopsis',
                'trailer'
            ]);

        });
    }
};