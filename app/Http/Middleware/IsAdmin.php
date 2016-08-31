<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IsAdmin {
    /**
     *
     * @var Guard
     */
    protected $auth;

    /**
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! $this->auth->user()->isAdmin())
        {
            if ($request->ajax())
            {
                return response('Forbidden.', 403);
            }
            else
            {
                throw new AccessDeniedHttpException;
            }
        }

        return $next($request);
    }
}
