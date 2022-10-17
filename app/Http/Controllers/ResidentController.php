<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("e") && $request->e == "ajax") {
            $residents = Resident::select(
                                 'id',
                                 DB::raw("CONCAT(". Resident::FIELD_LAST_NAME . ",', ', ".Resident::FIELD_FIRST_NAME.") AS resident_name"),
                                 Resident::FIELD_EMAIL,
                                 Resident::FIELD_CONTACT_NUMBER,
                                 Resident::FIELD_GENDER,
                                 'created_at as registered_at',
                                )
                                ->orderBy(Resident::FIELD_LAST_NAME, "ASC")->get();

            return ["data"=> $residents];
        }
        return view("residents.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("residents.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResidentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResidentRequest $request)
    {
        $data = $request->except(["_token"]);
       
        $resident = Resident::create($data);

        if($resident) {
            return redirect("residents")->with('alert-success', 'Resident Succesfully Created.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $positions)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return view("residents.view")->with("resident", $resident);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResidentRequest  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResidentRequest $request, Resident $resident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        //
    }
}
