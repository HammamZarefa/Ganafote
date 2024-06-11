<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCategoryCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::table('category_competitions', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9861779')->references('id')->on('categories');
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->foreign('competition_id', 'competition_fk_9861780')->references('id')->on('competitions');
        });
    }
}
