<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Inspection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function photo () {
        return $this->hasMany(Photo::class);
    }

    public function taker () {
        return $this->belongsTo(Taker::class);
    }

    public function photoDelete() {
        foreach ($this->photo as $photo) {
            $photo->manageDeletions();
        }
    }
}
