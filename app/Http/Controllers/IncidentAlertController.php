<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentAlert;
use App\Http\Requests\StoreIncidentAlertRequest;
use App\Http\Requests\UpdateIncidentAlertRequest;
use App\Services\IncidentAlertService;

class IncidentAlertController extends Controller
{

    protected $service;
    function __construct(IncidentAlertService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("e") && $request->e === "ajax") {
            $alerts = $this->service->fetchAll();

            return ["data"=>$alerts];
        }
        return view("incidents.alerts.index");
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
     * @param  \App\Http\Requests\StoreIncidentAlertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidentAlertRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncidentAlert  $incidentAlert
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentAlert $incidentAlert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidentAlert  $incidentAlert
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentAlert $incidentAlert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncidentAlertRequest  $request
     * @param  \App\Models\IncidentAlert  $incidentAlert
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidentAlertRequest $request, IncidentAlert $incidentAlert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidentAlert  $incidentAlert
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidentAlert $incidentAlert)
    {
        //
    }
}
