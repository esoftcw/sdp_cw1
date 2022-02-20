<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Pickup;
use App\Models\Status;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class StatusController extends Controller
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
    public function create($status)
    {
        $vehicles = Vehicle::all();
        $stats = Status::where('center_id', auth()->user()->center_id)->where('status', $status)->get();
        $stats = $stats->filter(function ($stat) use ($status){
           return Delivery::where('status', $status)->get()->count() > 0;
        });
        return view('statuses.form', compact('status', 'vehicles', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Status::create($request->all());
        $request->has('rider_id') ? session()->put('rider_id', $request->rider_id) : null;
        $request->has('vehicle_id') ? session()->put('vehicle_id', $request->vehicle_id) : null;
        return redirect()->back()->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
