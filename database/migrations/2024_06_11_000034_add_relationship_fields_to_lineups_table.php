<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLineupsTable extends Migration
{
    public function up()
    {
        Schema::table('lineups', function (Blueprint $table) {
            $table->unsignedBigInteger('match_id')->nullable();
            $table->foreign('match_id', 'match_fk_9861977')->references('id')->on('matches');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9861978')->references('id')->on('teams');
            $table->unsignedBigInteger('player_id')->nullable();
            $table->foreign('player_id', 'player_fk_9861979')->references('id')->on('players');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id', 'position_fk_9861980')->references('id')->on('positions');
        });
    }
}
