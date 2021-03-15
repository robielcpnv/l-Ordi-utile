<?php
/*
File name       : create_userlogs_table.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : useLog table

Author          :Tesfazghi  robiel
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* our userlogs table with a field for foreignkey from user table and adresse_ip */
        Schema::create('userlogs', function (Blueprint $table) {
            $table->id();
            /* delete this field if the user id deleted */
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->ipAddress('adresse_ip');
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
        Schema::dropIfExists('userlogs');
    }
}
