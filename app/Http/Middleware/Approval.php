<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Approval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {



        if(auth('mod')->user()->approval->status == false) return redirect('needs-approval');
        return $next($request);
    }
}
