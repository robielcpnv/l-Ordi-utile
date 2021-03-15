<?php
/*
File name       : create_localites_table.php
Begin           : 2021-03-09
Last Update     : 2021-03-09

Description     : for profile table

Author          :Tesfazghi  robiel
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /* create our localites table with a field for localites nom and npa */
        Schema::create('localites', function (Blueprint $table) {
            $table->id();
            $table->string('npa',4)->index();
            $table->string('nom',60)->index();
            $table->timestamps();

            $table->index(['npa','nom'],'unique_localite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localites');
    }
}
