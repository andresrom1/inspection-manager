<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Taker;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Query\Builder;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'taker_id' => 'required',
            'policyNumber' => 'required',
            'company' => 'required',
            'insuranceObject' => 'required',
            'installments' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            'policyUrl' => 'required',
        ]);

        Policy::create($data);

        return redirect('/policy')->with('success', 'Policy created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }

    public function search () {      

        if (request()->takerId) {
            $policies = Policy::where('taker_id', request()->takerId)
            ->where(function ($query) {
                $query->orWhere( 'insuranceObject', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'company', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'installments', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'policyNumber', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'insuranceObject', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'fromDate', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'toDate', 'LIKE', '%' . request()->search . '%' );
            })->get();           
        } else {
            $policies = Policy::where(function ($query) {
                $query->orWhere( 'insuranceObject', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'company', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'installments', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'policyNumber', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'insuranceObject', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'fromDate', 'LIKE', '%' . request()->search . '%' )
                      ->orWhere( 'toDate', 'LIKE', '%' . request()->search . '%' );
            })->get();
        }

        foreach ($policies as $policy) {
            $policy = $policy->withDatesFormatted()->toJson();
        }

        // dd($policies);

        return $policies;
    }
}
