<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Taker;
use App\Models\Policy;


class TakerPolicySeeder extends Seeder
{
    public function run()
    {
        $takersCount = 50;
        $policiesPerTaker = 3;

        Taker::factory()->count($takersCount)->create()->each(function ($taker) use ($policiesPerTaker) {
            $policies = Policy::factory()->count($policiesPerTaker)->create(['takerId' => $taker->id]);
            $taker->policies()-saveMany($policies);
        });
    }
}

