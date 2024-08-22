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
    public function index($query = null)
    {
        $takers = Taker::orderBy("name","desc")->paginate(5);
        return view("takers.index", compact('takers'));
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
        //dd($taker);
        // $data = Taker::findOrFail($taker->id);
        return view ('takers.edit', compact('taker'));
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

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:takers,email,'. $taker->id,
            'phone' => 'required',
            'id_type' => '',
            'id_number' => '',
            'adress' => '',
            'postal_code' => '',
        ]);

        $taker->update($data);

        return redirect()->route('takers.index')->with('success','Se ha actualizado el tomador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taker  $taker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taker $taker)
    {
        $taker->deleteOrFail();
        return redirect()->route('takers.index')->with('success', 'El tomador ' . $taker->name . ' ha sido eliminado.');
    }

    public function search () {

        $query=request()->email;

        $takers = Taker::where( 'email', 'LIKE', '%' . $query . '%' )->get();
        
        return $takers;
        
    }
}
