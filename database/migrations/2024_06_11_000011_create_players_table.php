<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('number');
            $table->string('age');
            $table->boolean('is_starter')->default(0)->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
