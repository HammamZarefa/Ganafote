<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('is_collaborator')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('state_province')->nullable();
            $table->string('township')->nullable();
            $table->string('zipcode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
