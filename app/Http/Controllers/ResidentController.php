<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ResidentController extends Controller
{
    const ROLE = "resident";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $residents = [];

            if (auth()->user()->hasRole("owner")) {
                $residents = User::where(User::FIELD_BARANGAY_ID, auth()->user()->{User::FIELD_BARANGAY_ID})->where(User::FIELD_ROLE, "resident")->get();
            } else {
                $residents = User::where(User::FIELD_ROLE, self::ROLE)->get();
            }

            return ["data" => $residents];
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            User::FIELD_FIRST_NAME=> [ "required", "string", "min:3"],
            User::FIELD_MIDDLE_NAME=> [ "sometimes","required", "string", "min:3"],
            User::FIELD_LAST_NAME=> [ "required", "string", "min:3"],
            User::FIELD_EMAIL=> [ "required", "string", "min:3", "unique:users"],
            User::FIELD_CONTACT_NUMBER=> [ "sometimes","required", "string", "min:11", "max:11"],
            User::FIELD_PASSWORD=> ["required","string", Rules\Password::defaults()]
        ]);


        
        $data = $request->except("_token", "password_confirmation");

        $data['password'] = Hash::make($data['password']);
        $data[User::FIELD_ROLE] = "resident";

        $resident = User::create($data);


        $resident->assignRole("resident");
        /**
         * TODO Add sending of email that validates the email address.
         */

        return redirect("residents")->with("alert-success", "New resident has been successfully added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = User::find($id);


        return view("residents.view")->with(["resident"=> $resident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = User::find($id);

        return view("residents.edit")->with("resident", $resident);
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
        $resident = User::find($id);
        $rules = [
            User::FIELD_FIRST_NAME => ["required", "string", "min:3"],
            User::FIELD_MIDDLE_NAME => ["sometimes", "required", "string", "min:3"],
            User::FIELD_LAST_NAME => ["required", "string", "min:3"],
            User::FIELD_EMAIL => ["required", "string", "min:3", "unique:users,email," . $id],
            User::FIELD_CONTACT_NUMBER => ["sometimes", "required", "string", "min:11", "max:11"],
        ];
        if($request->has("password") && !is_null($request->password)) {
            $rules[User::FIELD_PASSWORD] =  ["required", "string", Rules\Password::defaults()];
        }
        $request->validate($rules);

        if ($request->has("password") && !is_null($request->password) && Hash::check($request->{User::FIELD_PASSWORD}, $resident->{User::FIELD_PASSWORD}) === false) {
           $resident->{User::FIELD_PASSWORD} = Hash::make($request->password);
        }


       if(strcmp($request->first_name, $resident->{User::FIELD_FIRST_NAME}) === 1) {
        $resident->{User::FIELD_FIRST_NAME} = $request->first_name;
       }

       if(strcmp($request->middle_name, $resident->{User::FIELD_MIDDLE_NAME}) === 1) {
        $resident->{User::FIELD_MIDDLE_NAME} = $request->middle_name;
       }

       if(strcmp($request->last_name, $resident->{User::FIELD_LAST_NAME}) === 1) {
        $resident->{User::FIELD_LAST_NAME} = $request->last_name;
       }

       if(strcmp($request->email, $resident->{User::FIELD_EMAIL}) === 1) {
        $resident->{User::FIELD_EMAIL} = $request->email;
       }

       if(strcmp($request->contact_number, $resident->{User::FIELD_CONTACT_NUMBER}) === 1) {
        $resident->{User::FIELD_CONTACT_NUMBER} = $request->contact_number;
       }
       

       if($resident->isDirty()) {
        $resident->updated_at = Carbon::now()->toDateTimeString();
        $resident->save();
       }

       return redirect("residents")->with("alert-success", "Resident Updated successfully.");
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
