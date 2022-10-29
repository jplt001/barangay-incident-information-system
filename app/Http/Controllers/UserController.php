<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $uploadFileService;
    function __construct(UploadFileService $uploadFileService)
    {
        $this->uploadFileService = $uploadFileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = [];
           if(auth()->user()->hasRole("owner") || auth()->user()->hasRole("tanod"))
           {
                $data = User::with("role")->where(User::FIELD_BARANGAY_ID, auth()->user()->{User::FIELD_BARANGAY_ID})->orderBy(User::FIELD_LAST_NAME, "ASC")->where(User::FIELD_ROLE, '!=', 'resident')->get();
           } else {
                $data = User::with("role")->get();
           }

           return ["data"=>$data];



        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = ["owner"=> "Barangay Official", "tanod"=> "Barangay Tanod"];
        
        if(auth()->user()->hasRole("admin") || auth()->user()->hasRole("super-admin")) {
            $roles = Role::all()->pluck("display_name", "name")->toArray();
            $roles["owner"] = "Barangay official";
        } else if(auth()->user()->hasRole("owner")) {
            $roles = Role::whereIn("barangay_id", [0, auth()->user()->barangay_id])->whereNotIn("name", ["resident", "admin", "super-admin"])->get()->pluck("display_name", "name")->toArray();

            $roles["owner"] = "Barangay official";
        }

        return view("users.create")->with(["roles"=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            User::FIELD_FIRST_NAME => "required|string|min:3",
            User::FIELD_MIDDLE_NAME => "sometimes|required|string|min:3",
            User::FIELD_LAST_NAME => "required|string|min:3",
            User::FIELD_EMAIL => ['required', 'string', 'email', 'max:255', 'unique:users'],
            User::FIELD_PASSWORD=> ["required", "string", Rules\Password::defaults()],

        ];
        $request->validate($rules);


        $data = $request->except("_token");
        $data['email_verified_at'] = Carbon::now()->toDateTimeString();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // $user->sync
        return redirect("users")->with("alert-success", "You have successfully created new user.");
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
        $role = Role::where("name", $user->{User::FIELD_ROLE})->first();

        $user->{User::FIELD_ROLE} = $role->display_name;
        // dd($user);

        if(is_null($user)) return redirect("users")->with("alert-warning", "Sorry, user does not exists.");

        
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
        $roles = ["owner" => "Barangay Official", "tanod" => "Barangay Tanod"];

        if (auth()->user()->hasRole("admin") || auth()->user()->hasRole("super-admin")) {
            $roles = Role::get()->pluck("role");
        }

        return view('users.edit')->with(["user"=>$user, "roles"=> $roles]);
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

        if(is_null($user)) {
            return redirect("users")->with("alert-warning", "Sorry, user does not exist.");
        }
        $data = $request->except(["_token", "_method"]);


        if(!is_null($data[User::FIELD_PASSWORD]) && 
        Hash::check($data[User::FIELD_PASSWORD], $user->{User::FIELD_PASSWORD}) == false
        ) {
            $user->{User::FIELD_PASSWORD} = Hash::make($data[User::FIELD_PASSWORD]);
        }

        // First Name
        if($data[User::FIELD_FIRST_NAME] != $user->{User::FIELD_FIRST_NAME}) {
            $user->{User::FIELD_FIRST_NAME} = $data[User::FIELD_FIRST_NAME];
        }

        // Middle Name
        if($data[User::FIELD_MIDDLE_NAME] != $user->{User::FIELD_MIDDLE_NAME}) {
            $user->{User::FIELD_MIDDLE_NAME} = $data[User::FIELD_MIDDLE_NAME];
        }

        // Last Name
        if($data[User::FIELD_LAST_NAME] != $user->{User::FIELD_LAST_NAME}) {
            $user->{User::FIELD_LAST_NAME} = $data[User::FIELD_LAST_NAME];
        }

        // Email
        if($data[User::FIELD_EMAIL] != $user->{User::FIELD_EMAIL}) {
            $user->{User::FIELD_EMAIL} = $data[User::FIELD_EMAIL];
        }

        // Contact Number
        if($data[User::FIELD_CONTACT_NUMBER] != $user->{User::FIELD_CONTACT_NUMBER}) {
            $user->{User::FIELD_CONTACT_NUMBER} = $data[User::FIELD_CONTACT_NUMBER];
        }

        // Role
        if($data[User::FIELD_ROLE] != $user->{User::FIELD_ROLE}) {
            $user->{User::FIELD_ROLE} = $data[User::FIELD_ROLE];
        }

        if($user->isDirty()) {
            $user->save();
            
        }

        return redirect("users")->with("alert-success", "User '" . $user->{User::FIELD_FIRST_NAME} . "' successfully updated.");
        
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
