<?php
/* File name    : DomicileChart.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : controller for DomicileChart

Author          :Tesfazghi  robiel
*/
declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomicileChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
public function handler(Request $request): Chartisan
{
     /* this query some optimise */
    //quary for the group of localite 
    $localites = DB::table('profiles')->get()->groupBy('localite_id');
    $localites_id = [];
    $localites_size = [];
    $localites_nom = [];
    foreach($localites as $localite){
        foreach($localite as $x){
            if(!in_array($x->localite_id,$localites_id)){
                array_push($localites_id,$x->localite_id);
            }
        }
        array_push($localites_size, $localite->count());
    }
    foreach($localites_id as $id){
        array_push($localites_nom,DB::table('localites')->where('id',$id)->value('nom'));
    }
    /* pass the array to the chart */
    return Chartisan::build()
        ->labels($localites_nom)
        ->dataset('localite', $localites_size);
}
}
