<?php
/* File name    : DirectionMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middlewaredirection

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleare for direction */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()-> role =='Direction') {
            return $next($request);
        }
        return redirect('compte');
    }
}
