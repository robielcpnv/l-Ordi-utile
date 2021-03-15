<?php
/*
File name       : create_languages_table.php
Begin           : 2021-03-09
Last Update     : 2021-03-09

Description     : for langue table

Author          :Tesfazghi  robiel
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /* create our langues table with a field for language name */
        Schema::create('langues', function (Blueprint $table) {
            $table->id();
            $table->string('nom',45)->index();
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
        Schema::dropIfExists('langues');
    }
}
