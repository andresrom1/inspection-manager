<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getTakerByData($data) {

        $taker = Taker::firstOrCreate(
            ['email' => $data['email']],
            ['name' => $data['name']]
        );

        return $taker;
    }
}
