<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PortfolioAdminKey
{
    /**
     * Very small "admin" gate for portfolio forms.
     *
     * If PORTFOLIO_ADMIN_KEY is set in .env, require it via:
     * - query param: ?key=...
     * - or header: X-Portfolio-Key: ...
     */
    public function handle(Request $request, Closure $next)
    {
        $expected = env('PORTFOLIO_ADMIN_KEY');

        if (is_string($expected) && $expected !== '') {
            $provided = (string) ($request->query('key') ?? $request->header('X-Portfolio-Key', ''));

            if (! hash_equals($expected, $provided)) {
                abort(403);
            }
        }

        return $next($request);
    }
}

