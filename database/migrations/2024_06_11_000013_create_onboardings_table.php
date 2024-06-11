<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnboardingsTable extends Migration
{
    public function up()
    {
        Schema::create('onboardings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('subtitle');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
