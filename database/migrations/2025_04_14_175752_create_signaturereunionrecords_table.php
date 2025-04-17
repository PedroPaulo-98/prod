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
        Schema::create('signaturereunionrecords', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);//Nome responsável
            $table->string('unit', 100);//unidade ou orgão
            $table->longText('signature')->nullable();//Assinatura
            $table->unsignedBigInteger('reunionrecord_id');
            $table->foreign('reunionrecord_id')->references('id')->on('reunionrecords');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signaturereunionrecords');
    }
};
