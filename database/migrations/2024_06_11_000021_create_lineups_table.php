<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineupsTable extends Migration
{
    public function up()
    {
        Schema::create('lineups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_starter')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
