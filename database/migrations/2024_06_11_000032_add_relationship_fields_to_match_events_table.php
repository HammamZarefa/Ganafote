<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatchEventsTable extends Migration
{
    public function up()
    {
        Schema::table('match_events', function (Blueprint $table) {
            $table->unsignedBigInteger('match_id')->nullable();
            $table->foreign('match_id', 'match_fk_9861956')->references('id')->on('matches');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9861958')->references('id')->on('teams');
            $table->unsignedBigInteger('player_id')->nullable();
            $table->foreign('player_id', 'player_fk_9861959')->references('id')->on('players');
        });
    }
}
