<?php namespace Bantenprov\BGBurukPerawatan\Http\Middleware;

use Closure;

/**
 * The BGBurukPerawatanMiddleware class.
 *
 * @package Bantenprov\BGBurukPerawatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BGBurukPerawatanMiddleware
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
        return $next($request);
    }
}
