
<?php
        /**
     *namespace Database\Migrations;
     */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
        /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('estrutura');
        Schema::create('estrutura', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_categoria')->nullable();
            $table->integer('id_pessoa_juridica')->nullable();


            $table->foreign('id_categoria')
                ->references('id')->on('categoria_estrutura_organizacional')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_pessoa_juridica')
                ->references('id')->on('pessoa_juridica')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->timestamps();

        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('estrutura_organizacional');
    }
};
