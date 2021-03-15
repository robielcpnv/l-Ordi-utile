<?php
/* File name    : FormationChart.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : controller for FormationChart

Author          :Tesfazghi  robiel
*/
declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        /* quary for list of group of formation  */
        $formations = DB::table('profiles')->get()->groupBy('formation_id');
        $formations_id = [];
        $formations_size = [];
        $formations_nom = [];
        foreach($formations as $formation){
            foreach($formation as $x){
                if(!in_array($x->formation_id,$formations_id)){
                    array_push($formations_id,$x->formation_id);
                }
            }
           array_push($formations_size, $formation->count());
        }
        foreach($formations_id as $id){
            array_push($formations_nom,DB::table('formations')->where('id',$id)->value('nom'));
        }
        /* pass the array to the chart */
        return Chartisan::build()
            ->labels($formations_nom)
            ->dataset('formation', $formations_size);
    }
}
