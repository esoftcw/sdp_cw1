<?php

namespace App\Http\Controllers;

use App\Dtos\CreatePickupDto;
use App\Models\City;
use App\Models\Pickup;
use App\Services\CreatePickupService;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pickups = Pickup::paginate(10);
        return view('pickups.index', compact('pickups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pickups.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreatePickupService $service)
    {
        $service->handle(new CreatePickupDto($request->all()));
        return redirect()->route('pickups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function show(Pickup $pickup)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickup $pickup)
    {
        return view('pickups.form', compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pickup $pickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickup  $pickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickup $pickup)
    {
        //
    }
}
