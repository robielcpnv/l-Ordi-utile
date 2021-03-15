<?php
/* File name    : AgeChart.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : controller for AgeChart

Author          :Tesfazghi  robiel
*/
declare(strict_types = 1);

namespace App\Charts;

use App\Models\Profile;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        /* quary for list of age by group */
        $years = Profile::select([DB::raw("(COUNT(*)) as count"),
        DB::raw("YEAR(date_de_naissance) as year")])
        ->groupBy('year')
        ->orderBy('year')
        ->get();
        $age= []; //array for list of age
        $size = []; //array for size of each year
        $now = Carbon::now()->format('Y');
        foreach($years as $year){
            array_push($age,$now-$year->year);
            array_push($size,$year->count);
        }
        /* pass the array to the chart */
        return Chartisan::build()
            ->labels($age)
            ->dataset('Age', $size);
    }
}
