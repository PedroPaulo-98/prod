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
        Schema::create('reunionrecords', function (Blueprint $table) {
            $table->id();
            $table->string('mainagenda', 100);//Pauta principal
            $table->string('objective', 100);//Objetivo
            $table->string('location', 100);//Local
            $table->longText('discussion');//Discussão
            $table->date('data');//data
            $table->unsignedBigInteger('unit_id'); //Unidade
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('employee_id');//responsável
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunionrecords');
    }
};
