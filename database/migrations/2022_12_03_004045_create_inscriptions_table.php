<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->foreignId('activite_id')->constrained()->onDelete('cascade');
            $table->foreignId('enfant_id')->constrained()->onDelete('cascade');
            $table->date("date_inscription");
            $table->timestamps();
            $table->primary(['activite_id', 'enfant_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
};
