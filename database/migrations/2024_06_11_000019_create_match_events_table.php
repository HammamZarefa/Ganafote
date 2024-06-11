<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchEventsTable extends Migration
{
    public function up()
    {
        Schema::create('match_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_type');
            $table->string('minute')->nullable();
            $table->string('value')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
