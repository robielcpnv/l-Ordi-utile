<?php
/*
File name       : create_profiles_table.php
Begin           : 2021-03-09
Last Update     : 2021-03-12

Description     : route for the controller

Author          :Tesfazghi  robiel
*/

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
        /* our profiles table with a field for foreignkey from table langue,localite,formation and titre,date de naissance, adresse, telephone, email, image,remarsq and responsable info */
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
		    $table->foreignId('langue_id')->constrained();
		    $table->foreignId('localite_id')->constrained();
		    $table->foreignId('formation_id')->constrained();
            $table->enum('titre',['Monsieur','Madame','Autre'])->index();
		    $table->date('date_de_naissance');
		    $table->string('adresse', 60);
		    $table->string('telephone', 30);
		    $table->string('email')->unique()->constrained()->onDelete('cascade');; //unique b/c there can one beone profile per user
		    $table->string('image')->nullable();
		    $table->longText('remarque', 45)->nullable();
            $table->longText('confident_remarque')->nullable();
            $table->longText('confident_remarque_direction')->nullable();
            $table->string('responsable_nom',45)->index();
            $table->string('responsable_prenom',45)->index();
            $table->string('responsable_telephone',30);
            $table->string('responsable_email',30);

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
