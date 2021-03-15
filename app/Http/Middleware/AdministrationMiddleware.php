<?php
/* File name    : AdministrationMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middleware for adminitration

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdministrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleware for administration */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role =='Administration') {
            return $next($request);
        }
        return redirect('compte');
    }
}
