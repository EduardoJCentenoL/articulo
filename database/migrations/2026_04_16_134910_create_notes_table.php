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
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title", 100)->unique()->index();
            $table->text("content");

            // ? RELACIONES MODERNAS ENTRE TABLAS
            $table->foreignId("category_id")->constrained("categories")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->timestamps();
        });
    }

    // *comentario super importante
    // ? comentario de pregunta
    // ! Comentario de alerta
    //TODO: Comentario de cambios o algo asi
    ////Comentario tachado para codigo inservible

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
