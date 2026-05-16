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
         Schema::create('tikets', function (Blueprint $table) {
        $table->id('id_tiket');

        $table->unsignedBigInteger('id_admin');
        $table->unsignedBigInteger('id_film');
        $table->unsignedBigInteger('id_pembeli');

        $table->string('jadwal_film', 20);
        $table->string('no_kursi', 20);
        $table->string('harga', 20);

        $table->foreign('id_admin')
              ->references('id_admin')
              ->on('admins')
              ->onDelete('cascade');

        $table->foreign('id_film')
              ->references('id_film')
              ->on('films')
              ->onDelete('cascade');

        $table->foreign('id_pembeli')
              ->references('id_pembeli')
              ->on('pembelis')
              ->onDelete('cascade');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
