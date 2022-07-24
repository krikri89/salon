<?php

namespace App\Http\Controllers;

use App\Models\Saloon;
use Illuminate\Http\Request;

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
        $saloon = new Saloon;

        $saloon->saloon = $request->saloon_name;
        $saloon->street = $request->saloon_street;
        $saloon->number = $request->street_number;
        $saloon->city = $request->city;
        $saloon->zip = $request->zip_code;

        $saloon->save();
        return redirect()->route('saloons-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function show(Saloon $saloon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function edit(Saloon $saloon)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saloon  $saloon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saloon $saloon)
    {
        //
    }
}
