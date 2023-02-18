<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Support\Facades\Request;

class InspectionController extends Controller
{
    public function store () {
        
        Inspection::create([
            'user_id' => request('user_id'),
            'taker_id' => request('taker_id'),
            'tipo' => request('tipo'),
            'dominio' => request('dominio'),
            'compania' => request('compania'),
            'status' => request('status'),
        ]);

    }
}
