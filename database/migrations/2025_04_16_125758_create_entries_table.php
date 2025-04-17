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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);//Nome da entrada
            $table->string('entryexit', 100);//Entrada ou saída
            $table->longText('photo')->nullable(); // foto em base64 ou caminho do arquivo
            $table->string('photo_type')->nullable();
            $table->date('data');//data
            $table->unsignedBigInteger('concierge_id'); //Portaria
            $table->foreign('concierge_id')->references('id')->on('concierges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
