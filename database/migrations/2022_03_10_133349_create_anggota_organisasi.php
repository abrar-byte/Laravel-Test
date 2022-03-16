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
        Schema::create('anggota_organisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;;           
            $table->foreignId('anggota_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');  
             $table->string('position');
            // $table->string('number')->unique();         

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_organisasi');
    }
};
