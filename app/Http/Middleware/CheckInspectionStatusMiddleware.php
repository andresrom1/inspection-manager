<?php

namespace App\Http\Middleware;

use App\Models\Inspection;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckInspectionStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $inspection = Inspection::find($request->inspection_id);
        
        if( $inspection->created_at <= Carbon::today()->subDays(30) ){
            return redirect(route('link.expirado'));
        } 
        if ($inspection->status != "Aceptado" && $inspection->status != "Rechazado" && $inspection->status !="Cerrado") {
            return $next($request);
        } else {
            return redirect(route('link.expirado'));
        }
        
    }
}
