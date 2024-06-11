<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPlayersTable extends Migration
{
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9861673')->references('id')->on('categories');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9861674')->references('id')->on('teams');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id', 'position_fk_9861675')->references('id')->on('positions');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id', 'nationality_fk_9861693')->references('id')->on('countries');
        });
    }
}
