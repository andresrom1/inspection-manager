<?php

namespace App\Http\Middleware;

use App\Models\Inspection;
use App\Models\Taker;
use Closure;
use Illuminate\Http\Request;

class CheckMailOnTakerPhotoUploadMiddleware
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
        // return $next($request);
        // dump($request());
        
        //$inspectionData = json_decode($request->inspection);
        
        //$taker = Taker::find($inspectionData->taker_id);
        
        $taker = Taker::find($request->taker_id);
        //dd($taker);
        
        if ($taker->email == $request->email) {
            return $next($request);
        } else {
            return response('El mail ingresado es: ' . $request->email,404);
        }
        
    }
}
