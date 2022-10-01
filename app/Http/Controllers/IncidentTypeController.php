<?php

namespace App\Http\Controllers;

use App\Models\IncidentType;
use App\Http\Requests\StoreIncidentTypeRequest;
use App\Http\Requests\UpdateIncidentTypeRequest;

class IncidentTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreIncidentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidentTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncidentType  $incidentType
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentType $incidentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidentType  $incidentType
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentType $incidentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncidentTypeRequest  $request
     * @param  \App\Models\IncidentType  $incidentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidentTypeRequest $request, IncidentType $incidentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidentType  $incidentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidentType $incidentType)
    {
        //
    }
}
