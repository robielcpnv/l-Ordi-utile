<?php
/*
File name       : create-formation_table.php
Begin           : 2021-03-09
Last Update     : 2021-03-09

Description     : route for the controller

Author          :Tesfazghi  robiel
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* create our formations table with a field for formation name */
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('nom',60)->index();
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
        Schema::dropIfExists('formations');
    }
}
