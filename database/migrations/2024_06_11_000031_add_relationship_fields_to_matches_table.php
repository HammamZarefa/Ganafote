<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->unsignedBigInteger('team_home_id')->nullable();
            $table->foreign('team_home_id', 'team_home_fk_9861881')->references('id')->on('teams');
            $table->unsignedBigInteger('team_away_id')->nullable();
            $table->foreign('team_away_id', 'team_away_fk_9861882')->references('id')->on('teams');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9861883')->references('id')->on('categories');
            $table->unsignedBigInteger('competetion_id')->nullable();
            $table->foreign('competetion_id', 'competetion_fk_9861884')->references('id')->on('competitions');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->foreign('stage_id', 'stage_fk_9861885')->references('id')->on('stages');
            $table->unsignedBigInteger('stadium_id')->nullable();
            $table->foreign('stadium_id', 'stadium_fk_9861920')->references('id')->on('staduims');
            $table->unsignedBigInteger('collaborator_id')->nullable();
            $table->foreign('collaborator_id', 'collaborator_fk_9862020')->references('id')->on('clients');
        });
    }
}
