<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Taker;
use Illuminate\Support\Facades\Request;

class InspectionController extends Controller
{
    public function store () {
        $taker = Taker::getTakerByData([
            'name' => request('taker_name'),
            'email' => request('taker_email'),
        ]);

        Inspection::create([
            'user_id' => request('user_id'),
            'taker_id' => $taker->id,
            'tipo' => request('tipo'),
            'dominio' => request('dominio'),
            'compania' => request('compania'),
            'status' => request('status'),
        ]);

    }
}
