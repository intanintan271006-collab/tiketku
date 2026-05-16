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
         Schema::create('pembayarans', function (Blueprint $table) {
        $table->id('id_pembayaran');

        $table->unsignedBigInteger('id_pembeli');

        $table->string('metode_pembayaran', 30);
        $table->string('status', 30);
        $table->string('total_pembayaran', 30);

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
        Schema::dropIfExists('pembayarans');
    }
};
