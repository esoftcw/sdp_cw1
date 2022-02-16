<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Center;
use App\Models\City;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::paginate(10);
        return view('centers.index', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::limit(15)->get();
        return view('centers.form', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        $address = Address::create([
            'address' => $request->address,
            'city_id' => $request->city_id,
        ]);

        Center::create([
            'name' => $request->name,
            'address_id' => $address->id,
        ]);

        return redirect()->route('centers.index')->with('success', 'Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        return view('centers.form', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        $center->address->update([
           'address' => $request->address,
           'city_id' => $request->city_id,
        ]);

        $center->update([
            'name' => $request->name,
        ]);


        return redirect()->route('centers.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return redirect()->back()->with('success', 'Deleted Successfully.');

    }
}
