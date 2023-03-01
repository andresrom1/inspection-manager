<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create () {
        return view('photo.create');
    }
    public function store () {
       
        $data = request()->validate([
            'image' => '',
            'width' => '',
            'height' => '',
        ]);
        $inspection = Inspection::findOrFail(request()->inspection);
        //dd($inspection);
        
        $image = $data['image']->store('inspection-photo', 'public');
        $uploadedPhoto = $inspection->photo()->create([
            'path' => $image,
            'width' => $data['width'],
            'height' => $data['height'],
        ]);

        return $uploadedPhoto;
    }
}
