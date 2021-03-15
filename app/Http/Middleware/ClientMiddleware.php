<?php
/* File name    : ClientMiddleware.php
Begin           : 2021-03-15
Last Update     : 2021-03-15

Description     : middleware for client => it has no use for now

Author          :Tesfazghi  robiel
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* middleware for client */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role =='Client') {
            return $next($request);
        }
        return redirect('compte');
    }
}
