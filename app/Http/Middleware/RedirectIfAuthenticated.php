<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logs;
use Carbon\Carbon;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }
        return $next($request);
        $logs=new Logs;
            $logs->Cust_Id=Auth::id();
            $logs->Log_Module="Login";
            $logs->Log_Pay_Type=0;
            $logs->Log_Total_Price=0;
            $logs->Log_Status="Success";
            $logs->created_at=Carbon::now();
            $logs->updated_at=Carbon::now();
            $logs->save();
    }
}
