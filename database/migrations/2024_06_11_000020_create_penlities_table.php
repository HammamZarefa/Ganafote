<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenlitiesTable extends Migration
{
    public function up()
    {
        Schema::create('penlities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('penlity_order')->nullable();
            $table->boolean('result')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
