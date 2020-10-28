<?php

namespace App\Http\Middleware\Send;

use Closure;
use Illuminate\Http\Request;

class SendCallbackMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $request->merge(
            [
                'product'     => [10],
                'product_kol' => [1],
            ]
        );

        return $next($request);
    }
}
