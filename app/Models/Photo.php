<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manageDeletions (){

        $url = str_replace('storage','public',$this->url);
        $url_thumb = str_replace('storage','public',$this->url_thumb);

        Storage::delete( [ $url, $url_thumb ] );
        $this->delete();
    }
}
