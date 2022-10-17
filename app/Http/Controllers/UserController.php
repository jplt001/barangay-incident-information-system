<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("e") && $request->e == "ajax") {
            $users = User::select("id", "first_name", "middle_name", "last_name", "email")
                            ->with("position")
                            ->get();
            $data =[];
            foreach($users as $user) {
                $tmp = $user->toArray();


                array_push($data, $tmp);
            }
            return ["data"=> $data];
        }
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::all();

        $positions = $positions->pluck("name", "id");
        return view("users.create")->with(["positions"=> $positions]);
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
            "first_name" => ["required", "string", "max:255"],
            "middle_name" => ["required", "string", "max:255"],
            "last_name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "unique:users"],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
            "last_name" => "required|string",
        ]);

        $data = $request->except(["_token", "password_confirmation"]);
        $data['password'] = Hash::make($data['password']);
       
        $user = User::create($data);

        if($user) {
            return redirect("/users/" . $user->id)->with("alert-success", "You have successfully created new user.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("users.view")->with("user", $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $positions = Positions::all();

        $positions = $positions->pluck("name", "id");
        return view("users.edit")->with(["user"=> $user, "positions"=> $positions]);
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
        $user = User::find($id);

        // dd($request->all());
        $user->{User::FIELD_FIRST_NAME} = $request->first_name;
        $user->{User::FIELD_MIDDLE_NAME} = $request->middle_name;
        $user->{User::FIELD_LAST_NAME} = $request->last_name;
        $user->{User::FIELD_EMAIL} = $request->email;
        $user->{User::FIELD_CONTACT_NUMBER} = $request->contact_number;
        $user->{User::FIELD_INCASE_OF_EMERGENCY} = $request->incase_of_emergency;
        $user->{User::FIELD_INCASE_OF_EMERGENCY_MOBN_NUM} = $request->incase_of_emergency_mobile_number;
        $user->{User::FIELD_POSITION_ID} = $request->position_id;
        // dd($request->all());
        if($user->isDirty()) {
            $user->save();
        }

        return redirect("users")->with(["alert-success"=> "User has been successfully updated."]);
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
