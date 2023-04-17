<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function checkmail (Request $request)
    {
        //  dump(request());
        $inspection = Inspection::find($request->inspection_id);
        return view('photo.create', compact('inspection'));
    }
    public function create (Inspection $inspection, String $token) {
        //dd(request());
        return view('photo.check', compact('inspection','token'));
    }
    public function store (Request $request) {
        //dd(storage_path());
        $data = request()->validate([
            'image' => 'required',
        ]);
        $inspection = Inspection::findOrFail(request()->inspection);
        $random = Str::random(15);
        $filename = $random . "." . $request->file('image')->getClientOriginalExtension();
        $filename_thumb = $random . "_thumb." . $request->file('image')->getClientOriginalExtension();
        //$path = storage_path() . '\app\public\inspection-photo/';
        $path = storage_path() . '/app/public/inspection-photo/';
        $url = Storage::url('inspection-photo/');

        Image::make($request->file('image'))
        ->resize(800, null, function ($constraint) {
             $constraint->aspectRatio();
             $constraint->upsize();})
         ->save($path . $filename);

        Image::make($request->file('image'))
         ->fit(250, 250)
         ->save($path . $filename_thumb);
        
        $uploadedPhoto = $inspection->photo()->create([
            'url'=>$url.$filename,
            'url_thumb'=>$url.$filename_thumb,
        ]);

        return response('',201);
    }

    public function storeCloudinary (Inspection $inspection) {
        $uploadedPhoto = $inspection->photo()->create([
            'url'=>request()->response['url'],
            'url_thumb'=>request()->response['url'],
        ]);
        return response('',201);
    }

    public function index (Inspection $inspection) {
        $photos = Photo::where('inspection_id', $inspection->id )->get();
        return view('photo.index', compact('photos'));

    }
}
