
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
        Schema::dropIfExists('pessoa_juridica');
        Schema::create('pessoa_juridica', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 300)->nullable();
            $table->string('email', 300)->nullable();
            $table->longText('horario')->nullable();
            $table->longText('endereco')->nullable();
            $table->longText('competencias')->nullable();
            $table->timestamps();
        });
 Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_juridica');
    }
};
