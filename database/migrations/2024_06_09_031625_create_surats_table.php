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
    Schema::create('surats', function (Blueprint $table) {
        $table->id('idSurat')->primary();
        $table->integer('nomorsurat')->unique();
        $table->string('pengirim');
        $table->string('penerima');
        $table->string('perihal');
        $table->unsignedInteger('idUser'); 
        $table->unsignedBigInteger('idKategori'); 
        $table->timestamps();

        // Define foreign key
        $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
        $table->foreign('idKategori')->references('idKategori')->on('kategori_surats')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
