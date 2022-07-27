<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = Master::all();
        return view('masters.index', ['masters' => $masters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = Master::all();

        return view('masters.create', ['masters' => $masters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $master = new Master;

        if ($request->file('photo')) { // jeigu file yra

            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // kadangi gaunam object, pasiimam extension, tan kad galetume padaryti linka
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME); //originalus vardas w/o extension. kad eitu prideti extension kuriant nauja varda
            $file = $name . '-' . rand(100000, 999999) . '.' . $extension; // generuojam file varda. Del saugumo ji pervadiname. orgin name + bruksnys + rand number + taskas + origin extend

            // $Image = Image::make($photo)->greyscale();

            // $Image->save($originalPath . time() . $photo->getClientOriginalName());

            // $Image->move(public_path() . '/images', $file);

            $photo->move(public_path() . '/images', $file); // kur norim ideti sia photo. su pavadinimu kuri sukuriam su $file
            $master->photo = asset('/images') . '/' . $file; // i DB photo dali lenteleje

        }
        // $master->saloon_id = $request->saloon_id;
        $master->master = $request->master;
        $master->rating = $request->rating;

        $master->save();
        return redirect()->route('masters-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ Master  $ master
     * @return \Illuminate\Http\Response
     */
    public function show(int $masterId)
    {
        $master =  Master::where('id', $masterId)->first();
        return view('masters.show', ['master' => $master]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $ master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        $masters = Master::all();

        return view('masters.edit', [
            'master' => $master,
            // 'saloons' => $saloons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        // $master->saloon_id = $request->saloon_id;
        $master->master = $request->master;

        $master->save();
        return redirect()->route('masters-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();
        return redirect()->route('masters-index');
    }
}
