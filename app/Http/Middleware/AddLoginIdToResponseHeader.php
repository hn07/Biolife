<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\ResponseTrait;

class AddLoginIdToResponseHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (session()->has('loginId_Customer')) {
            $loginId = session('loginId_Customer');
            $customer = Customer::find($loginId);
            $response->header('X-LoginId-Customer', $loginId);
            $response->header('X-Customer-Name', $customer->name);
        }
        return $response;
    }
    
}
