<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (! $user && $user->role == 'admin' ) {
            return response()->json([
                'message' => 'Permission denied'
            ], "403");
        }
        return $next($request);
    }
}
