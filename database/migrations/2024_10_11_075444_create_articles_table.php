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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('designation',100)->unique();
            $table->string('reference',50)->index();
            $table->string('marque',50)->nullable();
            $table->integer('qtestock')->unsigned(); //unsigned  c a d doit etre positive 
            $table->decimal('prix',8,2); //9 chifre et 2 après virgule
            $table->string('imageart',200)->nullable();
            $table->unsignedBigInteger('scategorieID');
            $table->foreign('scategorieID')
            ->references('id')
            ->on('scategories')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
