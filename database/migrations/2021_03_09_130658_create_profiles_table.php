<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
		    $table->foreignId('langue_id')->constrained();
            $table->foreignId('responsable_id')->constrained();
		    $table->foreignId('confident_id')->constrained();
		    $table->foreignId('localite_id')->constrained();
		    $table->foreignId('formation_id')->constrained();
            $table->enum('titre',['Monsieur','Madame','Autre'])->index();
            $table->string('nom', 60)->index();
		    $table->string('prenom', 60)->index();
		    $table->enum('role', ['Direction', 'Administration', 'Client', 'Operateur'])->index();
		    $table->date('data_de_naissance');
		    $table->string('adresse', 60);
		    $table->string('telephone', 30);
		    $table->string('email')->unique();
		    $table->string('photo', 45)->default(null);
		    $table->string('message', 45)->default(null);
		    $table->string('remarque', 45)->default(null);
		    $table->string('CodeIdentifiant', 4)->autoIncrement();

            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
