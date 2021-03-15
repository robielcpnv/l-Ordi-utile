/*
File name       : DatabaseSeeder.php
Begin           : 2021-03-13
Last Update     : 2021-03-13

Description     : for create fake data

Author          :Tesfazghi  robiel
*/

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* for create fake user and profile for test 
            for execute run php artisan db:seed      
        */
        \App\Models\User::factory(200)->create();
        \App\Models\Langue::factory(100)->create();
        \App\Models\Localite::factory(100)->create();
        \App\Models\Formation::factory(4)->create();
        \App\Models\Userlog::factory(100)->create();
    }
}
