<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('content');
            $table->string('button_title')->nullable();
            $table->string('button_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
