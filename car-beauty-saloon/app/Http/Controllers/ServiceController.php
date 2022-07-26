<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Saloon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saloons = Saloon::all();
        $services = Service::all()->sortBy('service');
        return view('services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saloons = Saloon::all();

        return view('services.create', ['saloons' => $saloons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;

        $service->saloon_id = $request->saloon_id;
        $service->service = $request->service;

        $service->save();
        return redirect()->route('services-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(int $serviceId)
    {
        $service = Service::where('id', $serviceId)->first();
        return view('services.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $saloons = Saloon::all();

        return view('services.edit', [
            'service' => $service,
            'saloons' => $saloons
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->saloon_id = $request->saloon_id;
        $service->service = $request->service;

        $service->save();
        return redirect()->route('services-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services-index');
    }
}
