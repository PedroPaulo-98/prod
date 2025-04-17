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
        Schema::create('concierges', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);//Nome da entrada
            $table->string('unit', 100);//local secretaria
            $table->string('objective', 100);//Objetivo
            $table->date('data');//data
            $table->unsignedBigInteger('employee_id');//responsável
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedBigInteger('unit_id'); //Unidade
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concierges');
    }
};
