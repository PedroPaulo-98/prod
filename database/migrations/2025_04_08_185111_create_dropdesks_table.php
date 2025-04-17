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
        Schema::create('dropdesks', function (Blueprint $table) {
            $table->id();
            $table->string('callnumber', 100);
            $table->string('applicant', 100);//solicitante
            $table->string('subject', 100);//assunto
            $table->string('attendant', 100);//atendente
            $table->string('status', 100);//status
            $table->date('data', 100);//data
            $table->unsignedBigInteger('checklist_id');
            $table->foreign('checklist_id')->references('id')->on('checklists');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dropdesks');
    }
};
