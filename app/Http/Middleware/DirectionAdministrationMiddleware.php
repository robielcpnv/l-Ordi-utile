<?php
/* File name    : DirectionAdministrationMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middleware for adminitration, direction

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirectionAdministrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleware for direction and administration */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role =='Administration' or auth()->user()->role =='Direction' ) {
            return $next($request);
        }
        return redirect('compte');
    }
}
