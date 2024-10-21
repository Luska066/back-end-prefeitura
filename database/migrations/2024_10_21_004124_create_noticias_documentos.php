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
        Schema::create('noticias_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_documento')->nullable();
            $table->string('documento_url')->nullable();
            $table->unsignedBigInteger('id_noticia')->nullable();
            $table->foreign('id_noticia')
            ->references('id')->on('noticias')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias_documentos');
    }
};
