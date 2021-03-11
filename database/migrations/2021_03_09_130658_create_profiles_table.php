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
		    $table->foreignId('confident_id')->constrained()->nullable();
		    $table->foreignId('localite_id')->constrained();
		    $table->foreignId('formation_id')->constrained();
            $table->enum('titre',['Monsieur','Madame','Autre'])->index();
            $table->string('nom', 60)->index();
		    $table->string('prenom', 60)->index();
		    $table->enum('role', ['Direction', 'Administration', 'Client', 'Operateur'])->index();
		    $table->date('date_de_naissance');
		    $table->string('adresse', 60);
		    $table->string('telephone', 30);
		    $table->string('email')->unique();
		    $table->string('photo', 45)->default(null);
		    $table->string('message', 45)->default(null);
		    $table->string('remarque', 45)->default(null);
		    $table->string('code_identifiant', 4)->autoIncrement();
            $table->string('responsable_nom',45)->index();
            $table->string('responsable_prenom',45)->index();
            $table->string('responsable_telephone',30);
            $table->string('responsable_email',30);
            $table->ipAddress('adresse_ip');

            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
            $table->index(['responsable_nom','responsable_prenom'],'unique_responsable');
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
