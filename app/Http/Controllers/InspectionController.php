<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Taker;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class InspectionController extends Controller
{
    public function create() {
        return view ('inspection.create');
    }
    public function store () {

        $data = request()->validate([
            'dominio' => 'required',
            'takerEmail'=> 'required|email',
            'takerName' => 'required',
            'tipo' => 'required',
            'compania' => 'required',
        ]);

        $user = Auth::user();

        $taker = Taker::getTakerByData([
            'name' => request('takerName'),
            'email' => request('takerEmail'),
        ]);

        Inspection::create([
            'user_id' => $user->id,
            'taker_id' => $taker->id,
            'tipo' => request('tipo'),
            'dominio' => request('dominio'),
            'compania' => request('compania'),
        ]);

        return view('dashboard');

    }
}
