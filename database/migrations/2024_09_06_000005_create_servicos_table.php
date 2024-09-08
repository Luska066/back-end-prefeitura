<?php
/**
 *namespace Database\Migrations;
 */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('servicos');
        Schema::create('servicos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_categoria_perfil')->nullable();
            $table->unsignedBigInteger('id_categoria_tipo')->nullable();
            $table->string('titulo')->nullable();
            $table->longText('descricao')->nullable();
            $table->longText('redirect_uri')->nullable();
            $table->string('icon')->nullable();

            $table->foreign('id_categoria_perfil')
                ->references('id')->on('servicos_categoria_perfil')
                ->onDelete('cascade');

            $table->foreign('id_categoria_tipo')
                ->references('id')->on('servicos_categoria_tipo')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
};
