<?php

/*
File name       : create_users_table.php
Begin           : 2021-03-02
Last Update     : 2021-03-09

Description     : for profile table

Author          :Tesfazghi  robiel
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* create our users table with a field for users name,prenom, role, email and password */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 60)->index();
		    $table->string('prenom', 60)->index();
            $table->enum('role', ['Direction', 'Administration', 'Client', 'Operateur'])->index();
            $table->string('email')->unique()->constrained()->onDelete('cascade');;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
