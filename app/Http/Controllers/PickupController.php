<?php

namespace App\Http\Controllers;

use App\Dtos\CreatePickupDto;
use App\Models\City;
use App\Models\Pickup;
use App\Models\User;
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
        $pickups = Pickup::whereNull('rider_id');

        if(auth()->user()->role == 'system-admin'){
            $pickups = $pickups;
        } elseif(auth()->user()->role == 'center-admin'){
            $pickups = $pickups->where('center_id', auth()->user()->center_id);
        } elseif(auth()->user()->role == 'customer') {
            $pickups = $pickups->where('customer_id', auth()->user()->customer->id);
        }

        $pickups = $pickups->paginate(10);

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
        return redirect()->route('pickups.index')->with('success', 'Added Successfully');
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
        $request->validate([
           'rider_id' => 'required'
        ]);

        $pickup->update([
            'rider_id' => $request->rider_id,
        ]);
        return redirect()->route('pickups.index')->with('success', 'Updated Successfully');

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
