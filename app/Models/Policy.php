<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Policy extends Model
{
    use HasFactory;

    protected $guarded = [];

        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'fromDate' => 'datetime',
    //     'toDate' => 'datetime',
    // ];
    
    protected function fromDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y'),

            set: fn($value) => Carbon::parse($value)->format('d-m-y'),
        );
    }
    protected function toDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y'),

            set: fn($value) => Carbon::parse($value)->format('d-m-y'),
        );
    }

    public function withDatesFormatted() 
    {
        $this->fromDate = $this->fromDate;
        $this->toDate = $this->toDate;

        return $this;
    }


    // public function formattedFromDate()
    // {
    //     return $this->fromDate->format('Y-m-d');
    // }

    // public function formattedToDate()
    // {
    //     return $this->toDate->format('Y-m-d');
    // }

    public function taker() {
        return $this->belongsTo(Taker::class);
    }
}
