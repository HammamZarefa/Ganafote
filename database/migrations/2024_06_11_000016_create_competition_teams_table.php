<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('competition_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group');
            $table->integer('play')->nullable();
            $table->integer('points')->nullable();
            $table->integer('goals')->nullable();
            $table->integer('goal_gainst')->nullable();
            $table->integer('win')->nullable();
            $table->integer('lose')->nullable();
            $table->integer('draw')->nullable();
            $table->integer('yellow_cards')->nullable();
            $table->integer('red_cards')->nullable();
            $table->integer('top_scorer_goals')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
