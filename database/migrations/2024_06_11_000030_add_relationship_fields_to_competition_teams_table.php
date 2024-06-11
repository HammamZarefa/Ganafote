<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCompetitionTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('competition_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->foreign('competition_id', 'competition_fk_9861798')->references('id')->on('competitions');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9861799')->references('id')->on('teams');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9861800')->references('id')->on('categories');
            $table->unsignedBigInteger('top_scorer_id')->nullable();
            $table->foreign('top_scorer_id', 'top_scorer_fk_9861811')->references('id')->on('players');
        });
    }
}
