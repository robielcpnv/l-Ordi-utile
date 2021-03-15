<?php
/* File name    : StatiqueController.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : controller for Statisque page

Author          :Tesfazghi  robiel
*/
namespace App\Http\Controllers;


class StatistiqueController extends Controller
{
    /* route for page list of chart */
    public function index(){
        return view('statistiques.index');
    }
    /* route for age chart */
    public function age(){
        return view('statistiques.age');
    }
    /* route for domicile chart */
    public function domicile(){
        return view('statistiques.domicile');
    }
    /* route for formation chart */
    public function formation(){

        return view('statistiques.formation');
    }
}
