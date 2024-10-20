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
        Schema::create('historia', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fundacao');
            $table->string('aniversario');
            $table->string('gentilico');
            $table->string('populacao');
            $table->string('area');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_historia');
    }
};
