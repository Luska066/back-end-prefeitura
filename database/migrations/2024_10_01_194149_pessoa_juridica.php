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
        Schema::dropIfExists('cargos_pessoa_juridica');
        Schema::create('cargos_pessoa_juridica', function (Blueprint $table){
           $table->id();
           $table->string('nome');
           $table->timestamps();
        });
        Schema::table('pessoa_juridica', function(Blueprint $table) {
          $table->unsignedBigInteger('id_cargo')->nullable();
          $table->foreign('id_cargo')->references('id')->on('cargos_pessoa_juridica')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
