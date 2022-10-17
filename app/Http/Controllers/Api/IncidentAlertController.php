<?php

namespace App\Http\Controllers\Api;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IncidentAlert;
use App\Services\ResidentServices;
use Illuminate\Support\Facades\Validator;

class IncidentAlertController extends Controller
{
    protected $services;
    function __construct(ResidentServices $services)
    {
        $this->services = $services;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "residentid"=> "required|exists:".Resident::TABLENAME. ",id"
        ]);

        if($validator->fails()) return response()->json(["errors"=> $validator->errors(), "code"=> 302], 302);

        $residentID = $request->residentid;
        $data = $this->services->MyReportedIncidents($residentID);

        return $this->ApiResponse($data);
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
            "resident_id"=> "required|exists:residents,id",
            "incident_type_id"=> "required|exists:incident_types,id",
            "report_summary"=> "required|min:10|max:300",
            "description"=> "nullable|min:10",
            "latitude"=> "nullable|int",
            "longitude"=> "nullable|int",

        ]);


        $sets = $request->all();
        // dd(auth()->user());

        $incidentReport = IncidentAlert::create($sets);

        
        return $this->ApiResponse($incidentReport, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return IncidentAlert::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
