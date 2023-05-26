<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Photo;
use App\Models\Taker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class InspectionController extends Controller
{
    public function editStatus (Inspection $inspection) {
        return view ('inspection.editStatus', compact('inspection'));
    }
    public function changeStatus(Inspection $inspection) {

        $inspection->update([
            'status' => request()->status
        ]);

        if (request()->origen == 'form') {
            return redirect (route('inspections.index'));
        } else {
            return;
        }
    }
    
    public function edit (Inspection $inspection) {
        return view ( 'inspection.edit', compact('inspection'));
    }
    public function update (Inspection $inspection) {
        
        $checkboxSelection = $this->checkBoxSelection();
        
        $data = request()->validate([
            'dominio' => 'required',
            'takerEmail'=> 'required|email',
            'takerName' => 'required',
            'tipo' => 'required',
            'compania' => 'required',
        ]);

        $data['selection'] = $this->setOptions( $checkboxSelection );

        $taker = Taker::updateTaker([
            'name' => request('takerName'),
            'email' => request('takerEmail'),
        ]);

        $inspection->update([
            'tipo' => request('tipo'),
            'dominio' => request('dominio'),
            'compania' => request('compania'),
            'selected' => $data['selection'],
        ]);

        return redirect ( route('inspections.index'));
    }
    public function show (Inspection $inspection) {

        return view('inspection.show', compact('inspection'));
    }
    public function destroyConfirm (Inspection $inspection) {

        return view('inspection.destroy', compact('inspection'));
    }
    public function destroy (Inspection $inspection) {
        $inspection->photoDelete();
        $inspection->delete();
        return redirect(route('inspections.index'));
    }
    public function index () {
        $inspections = Inspection::with('taker')->get();
        return view ('inspection.index', compact('inspections'));
    }

    public function indexTable () {     
        $data = $this->prepData();
        return $data;
    }

    public function create() {
        return view ('inspection.create');
    }
    public function store () {

        $checkboxSelection = $this->checkBoxSelection(); 
       
        $data = request()->validate([
            'dominio' => 'required',
            'takerEmail'=> 'required|email',
            'takerName' => 'required',
            'tipo' => 'required',
            'compania' => 'required',
        ]);

        $data['selection'] = $this->setOptions( $checkboxSelection );

        $user = Auth::user();

        $taker = Taker::getTakerByData([
            'name' => request('takerName'),
            'email' => request('takerEmail'),
        ]);

        Inspection::create([
            'user_id' => $user->id,
            'taker_id' => $taker->id,
            'tipo' => request('tipo'),
            'dominio' => request('dominio'),
            'compania' => request('compania'),
            'selected' => $data['selection'],
        ]);

        return redirect( route('inspections.index') );

    }

    public function setOptions($checkboxSelection) {

        foreach ($checkboxSelection as $key => $value) {
            if (!request()->$key) {
                $data['selection'][$key] = $value;
            } else {
                $data['selection'][$key] = request()->$key;
            }
        }
        return $data['selection'];
    }
    public function checkBoxSelection () {
        return [
            'frontOption' => 'false',
            'leftOption' => 'false',
            'backOption' => 'false',
            'rightOption' => 'false',
            'wheelOption' => 'false',
            'glassOption' => 'false',
            'boardOption' => 'false',
            'cardOption' => 'false',
        ];
    }

    public function prepData () {
        $inspections = Inspection::with('taker')->get();
        
        $array['data'] = [];

        foreach ($inspections as $ins) {
            array_push($array['data'], [
                'id' => $ins->id,
                'user_id' => $ins->user_id,
                'taker_id' => $ins->taker_id,
                'tipo' => $ins->tipo,
                'dominio' => $ins->dominio,
                'compania' => $ins->compania,
                'status' => $ins->status,
                'token' => $ins->token,
                'created_at' => $ins->created_at,
                'updated_at' => $ins->updated_at,
                'taker_name' => $ins->taker->name,
                'taker_email' => $ins->taker->email

            ] );
        }

        return collect($array)->toJson();

        return [
            'data' => [
                [
                "id" => "1",
                "name" => "Tiger Nixon",
                "position" => "System Architect",
                "salary" => "$320,800",
                "start_date" => "2011/04/25",
                "office" => "Edinburgh",
                "extn" => "5421"
                ],
                [
                "id" => "2",
                "name" => "Garrett Winters",
                "position" => "Accountant",
                "salary" => "$170,750",
                "start_date" => "2011/07/25",
                "office" => "Tokyo",
                "extn" => "8422"
                ]
            ]
        ];
    }
}
