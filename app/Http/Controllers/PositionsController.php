<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use App\Http\Requests\StorePositionsRequest;
use App\Http\Requests\UpdatePositionsRequest;

class PositionsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePositionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePositionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function show(Positions $positions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function edit(Positions $positions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePositionsRequest  $request
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionsRequest $request, Positions $positions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positions $positions)
    {
        //
    }
}
