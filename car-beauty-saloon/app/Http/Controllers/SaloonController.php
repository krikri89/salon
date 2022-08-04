<?php

namespace App\Http\Controllers;

use App\Models\Saloon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaloonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saloons = Saloon::all();
        return view('saloons.index', ['saloons' => $saloons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saloons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'saloon' => ['required', 'min:3', 'max:64'], // is create input name, required - mandatory uzpildyti, min 3 simboliai ir max 64
                // 'create_color_input' => ['required', 'regex:/^\#([0-9A-f]){6}$/i'],
                //gali buti skaiciai nuo 0- iki 9, raides nuo a iki f(mazosios ir didziosios) ir total 6. 
            ],
            [
                // 'author_surname.min' => 'mano zinute'// jeigu norim prideti savo error zinute
            ]

        );
        if ($validator->fails()) { //tikrina ar viskas yra ok, sie errors buna pagaunami per main msg file su ($errors->any()
            $request->flash(); //sumeta i 
            return redirect()->back()->withErrors($validator);
        }

        $saloon = new Saloon;

        $saloon->saloon = $request->saloon_name;
        $saloon->street = $request->saloon_street;
        $saloon->number = $request->street_number;
        $saloon->city = $request->city;
        $saloon->zip = $request->zip_code;

        $saloon->save();
        return redirect()->route('saloons-index')->with('success', 'New Saloon succesfully added to the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function show(int $saloonId)
    {
        $saloon = Saloon::where('id', $saloonId)->first();
        return view('saloons.show', ['saloon' => $saloon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function edit(Saloon $saloon)
    {
        return view('saloons.edit', ['saloon' => $saloon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saloon $saloon)
    {
        $saloon->saloon = $request->saloon_name;
        $saloon->street = $request->saloon_street;
        $saloon->number = $request->street_number;
        $saloon->city = $request->city;
        $saloon->zip = $request->zip_code;

        $saloon->save();
        return redirect()->route('saloons-index')->with('success', 'Info updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saloon $saloon)
    {
        $saloon->delete();
        return redirect()->route('saloons-index')->with('deleted', 'Saloon removed from the list');
    }
}
