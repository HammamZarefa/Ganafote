<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable();
            $table->date('start_date');
            $table->time('start_time');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->integer('home_half_score')->nullable();
            $table->integer('away_half_score')->nullable();
            $table->integer('home_yellow_card')->nullable();
            $table->integer('away_yellow_card')->nullable();
            $table->integer('home_red_card')->nullable();
            $table->integer('away_red_card')->nullable();
            $table->longText('home_summery')->nullable();
            $table->longText('away_summery')->nullable();
            $table->string('has_penlty')->nullable();
            $table->time('end_time')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('is_archived')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
