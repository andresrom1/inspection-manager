<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create () {
        return view('photo.create');
    }
    public function store (Inspection $inspection) {

        dd(request());
    }
}
