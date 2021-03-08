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

       

        Schema::create('Responsable', function (Blueprint $table) {
            $table->increments('resId');
            $table->string('resNom',45);
            $table->string('resPrenom',45);
            $table->string('resEmail',30);
            $table->string('resTel',30);
            
            $table->unique('resEmail','responsableUniqueEmail');
            $table->index(['resNom','resPrenom',],'uniqueResponsable');

            
            $table->timestamps();
        });

        Schema::create('Localite', function (Blueprint $table) {
            $table->increments('locId');
            $table->string('locNPA',4);
            $table->string('locNom',60);

            $table->index(['locNPA','locNom'],'uniqueLocalite');
            
            $table->timestamps();
        });

        Schema::create('Langue', function (Blueprint $table) {
            $table->increments('lanId');
            $table->string('lanNom',45);
            $table->index('lanNom','langueUnique');
            
            $table->timestamps();
        });

        Schema::create('Formation', function (Blueprint $table) {
            $table->increments('forId');
            $table->string('forNom',60);
            $table->index('forNom','formationUnique');
            
            $table->timestamps();
        });

        Schema::create('Confident', function (Blueprint $table) {
            $table->increments('conId');
            $table->ipAddress('conIpAdress');
            $table->longText('conRemarque');
            
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('proId');
            $table->integer('Responsable_resId')->unsigned();
		    $table->integer('Localite_locId')->unsigned();
		    $table->integer('Langue_lanId')->unsigned();
		    $table->integer('Formation_forId')->unsigned();
		    $table->integer('Confident_conId')->unsigned();
            $table->enum('proTitre',['Monsieur','Madame','Autre']);
            $table->string('proNom', 60);
		    $table->string('proPrenom', 60);
		    $table->enum('perRole', ['Direction', 'Administration', 'Client', 'Operateur']);
		    $table->date('proDateNaissance');
		    $table->string('proAdresse', 60);
		    $table->string('proTel', 30);
		    $table->string('proEmail')->unique();
		    $table->string('proPhoto', 45)->default(null);
		    $table->string('proMessage', 45)->default(null);
		    $table->string('proRemarque', 45)->default(null);
		    $table->string('perCodeIdentifiant', 4)->default(null);
		    $table->string('Profilecol', 45)->default(null);

            $table->unique('proemail','utilisateurUniqueEmai');
            $table->index(['proNom', 'proPrenom', 'proDateNaissance'],'uniqueutilisateur');

            $table->index('localite_locid','fk_localite_idx');
		    $table->index('langue_lanid','fk_langue_idx');
		    $table->index('formation_forid','fk_formation_idx');
		    $table->index('confident_conid','fk_confident_idx');
            $table->index('responsable_resId','fk_responsable_idx');
           
            $table->foreign('Responsable_resId')->references('resId')->on('Responsable');
		    $table->foreign('Localite_locId')->references('locId')->on('Localite');
		    $table->foreign('Langue_lanId')->references('lanId')->on('Langue');
		    $table->foreign('Formation_forId')->references('forId')->on('Formation');
		    $table->foreign('Confident_conId')->references('conId')->on('Confident');
            $table->foreign('proEmail')->references('email')->on('users');

            

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

        Schema::dropIfExists('Responsable');
        Schema::dropIfExists('Localite');
        Schema::dropIfExists('Langue');
        Schema::dropIfExists('Formation');
        Schema::dropIfExists('Confident');
        Schema::dropIfExists('profiles');

    }
}
