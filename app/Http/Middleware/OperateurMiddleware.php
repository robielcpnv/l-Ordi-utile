<?php
/* File name    : OperateurMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middleware for operateur

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperateurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleware for oprerateur */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role =='Operateur') {
            return $next($request);
        }
        return redirect('compte');
    }
}
