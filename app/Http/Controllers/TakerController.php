<?php

namespace App\Http\Controllers;

use App\Models\Taker;
use Illuminate\Http\Request;

class TakerController extends Controller
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
        return view ('takers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $takerData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:takers',
            'phone' => 'required',
            'id_type' => '',
            'id_number' => '',
            'adress' => '',
            'postal_code' => '',
        ]);
        $procedence = $request->validate([
            'procedence' => '',
        ]);
        

        // $policyData =$request->validate([

        // ]);
        
        // $installmentData =$request->validate([

        // ]);


        $taker = Taker::create($takerData);

        // $policy = Policy::create($policyData);

        // $installment = Installment::create($installemntData);


        if ($procedence['procedence'] == "crud") {
            return view ('takers.create');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taker  $taker
     * @return \Illuminate\Http\Response
     */
    public function show(Taker $taker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taker  $taker
     * @return \Illuminate\Http\Response
     */
    public function edit(Taker $taker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taker  $taker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taker $taker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taker  $taker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taker $taker)
    {
        //
    }

    public function search () {

        $query=request()->email;

        $takers = Taker::where( 'email', 'LIKE', '%' . $query . '%' )->get();
        
        return $takers;
        
    }
}
