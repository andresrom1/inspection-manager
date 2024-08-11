<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Policy;
use App\Models\Taker;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_taker()
    {
        $taker = Taker::factory()->create();
        $policy = Policy::factory()->create(['takerId' => $taker->id]);

        $this->assertInstanceOf(Taker::class, $policy->taker);
        $this->assertEquals($taker->id, $policy->taker->id);
    }

    /** @test */
    public function it_can_get_formatted_dates()
    {
        $fromDate = Carbon::now();
        $toDate = Carbon::now()->addYear();

        $policy = Policy::factory()->create([
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);

        $this->assertEquals($fromDate->format('Y-m-d'), $policy->formattedFromDate());
        $this->assertEquals($toDate->format('Y-m-d'), $policy->formattedToDate());
    }
}

