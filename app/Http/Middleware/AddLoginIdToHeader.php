<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Customer;
use Symfony\Component\HttpFoundation\Session\Session;

class AddLoginIdToHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next): Response
        {
            $customer = Customer::where('id', Session('loginId_Customer'))->get();
            
            view()->share('customer', $customer);
            return $next($request);
        }
}
