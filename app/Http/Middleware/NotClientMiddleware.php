<?php
/* File name    : NotClientMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middleware for operateur, adminitration, direction

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleware for operateur, adminitration, direction */
    public function handle(Request $request, Closure $next)
    {
         //checkin the user is not Client
        if (auth()->user()->role !='Client') {
            return $next($request);
        }
        return redirect('compte');//if not redirect to the compte
    }
}
