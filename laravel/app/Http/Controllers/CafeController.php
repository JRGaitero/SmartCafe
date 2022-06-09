<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cafe::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cafe = new Cafe();
        $cafe->name = $request->name;
        $cafe->location = $request->location;
        $cafe->is_open = $request->is_open;
        $cafe->user_id = auth()->user()->id;

        $cafe->save();
        return $cafe->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cafe::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cafe = Cafe::findOrFail($id);

        $cafe->name = $request->name;
        $cafe->location = $request->location;
        $cafe->is_open = $request->is_open;

        $cafe->save();

        return $cafe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cafe = Cafe::destroy($id);
        return $cafe;
    }
}
