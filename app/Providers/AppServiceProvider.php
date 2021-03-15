<?php
/*
File name       : AppServiceProvider.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : route for our statistique charte

Author          :Tesfazghi  robiel
*/


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts; //alais for ConosoleVs route

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //register our charte
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\AgeChart::class,
            \App\Charts\DomicileChart::class,
            \App\Charts\FormationChart::class
        ]);
    }
}
