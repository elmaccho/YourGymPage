<?php

namespace App\Http\Middleware;

use App\ValueObjects\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class CheckCartContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cart = Session::get('cart');

        if ($cart instanceof Cart && $cart->hasItems()) {
            return $next($request);
        }

        return redirect()->route('cart.index')->with('error', 'Koszyk jest pusty.');
    }
}
