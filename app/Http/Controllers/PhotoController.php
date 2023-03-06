<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function create (Inspection $inspection) {
        return view('photo.create', compact('inspection'));
    }
    public function store (Request $request) {
        //dd(request()->all());
        $data = request()->validate([
            'image' => 'required',
        ]);
        $inspection = Inspection::findOrFail(request()->inspection);
        $random = Str::random(15);
        $filename = $random . "." . $request->file('image')->getClientOriginalExtension();
        $filename_thumb = $random . "_thumb." . $request->file('image')->getClientOriginalExtension();
        $path = storage_path() . '\app\public\inspection-photo/';
        $url = Storage::url('inspection-photo/');
        //dd($path);

        Image::make($request->file('image'))
        ->resize(800, null, function ($constraint) {
             $constraint->aspectRatio();
             $constraint->upsize();})
         ->save($path . $filename);

        Image::make($request->file('image'))
         ->fit(250, 250)
         ->save($path . $filename_thumb);
        
        //$image = $data['image']->store('inspection-photo', 'public');
        
        $uploadedPhoto = $inspection->photo()->create([
            'url'=>$url.$filename,
            'url_thumb'=>$url.$filename_thumb,
        ]);

        return response('',201);
    }
}
