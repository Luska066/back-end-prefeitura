
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
        Schema::dropIfExists('portal_transparencia');
        Schema::create('portal_transparencia', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->integer('id_categoria_portal_transparencia')->nullable();
            $table->longText('redirect_uri')->nullable();
            $table->string('icon')->nullable();

            $table->index(["id_categoria_portal_transparencia"], 'fk_portal_transparencia_categoria_portal_transparencia_idx');


            $table->foreign('id_categoria_portal_transparencia')
                ->references('id')->on('categoria_portal_transparencia')
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
        Schema::dropIfExists('portal_transparencia');
    }
};
