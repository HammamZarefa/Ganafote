<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaduimsTable extends Migration
{
    public function up()
    {
        Schema::create('staduims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
