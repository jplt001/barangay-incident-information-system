<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $validator = Validator::make($request->all(), [
            "email"=> ["required", "email", "string", "max:255", "exists:users"]
        ]);

        if($validator->fails()) return $this->ApiResponse(302, "Account Error", $validator->errors());

        $credentials = $request->all();

        $isAuthrized = Auth::attempt($credentials);

        if(!$isAuthrized) return $this->UnauthorizedApiResponse();


        $user=  auth()->user();

        $token = $user->createToken("123123")->plainTextToken;

        return $this->ApiResponse("Authenticated", 201, true, ["user"=> $user, "token"=>$token]);

        
    }


    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            "first_name" => ["required", "string", "max:255"],
            "middle_name" => ["sometimes", "required", "string", "min:3", "max:255"],
            "last_name" => ["required", "string", "max:255"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "password_confirmation"=>[ "required", Rules\Password::defaults()],
            "contact_number"=> ["required", "max:12"],
            "barangay_id"=> ["required", "exists:barangays,id"],
            "gender"=> ["required"]
        ]);

        if($validator->fails()) return $this->ApiResponse("Fields Required", 302,  false, $validator->errors());

        $data = $request->all();

        $data[User::FIELD_PASSWORD] = Hash::make($data[User::FIELD_PASSWORD]);


        return $data;
        // $resident = User::create($data);


        // $resident->assignRole("resident");
    }


    public function logout(Request $request) {

    }


    public function me(Request $request) {

        $token = $request->bearerToken();

        $user = auth()->user();
        return $this->ApiResponse("Authorized", 201, true, ["user"=> $user, "token"=> $token]);
    }


    public function BarangayVerification(Request $request) {
        $validator = Validator::make($request->all(), [
            "barangay_code"=> "required",
        ]);

        if($validator->fails()) return $this->ApiResponse("Fields Required", 302, false, ["errors"=> $validator->errors()]);

        $barangay_code = $request->barangay_code;

        $barangay = Barangay::where(Barangay::FIELD_CODE, $barangay_code)->first(["id", "code", "name", "logo", "address1"]);


        if(is_null($barangay)) {
            return $this->ApiResponse("Barangay code invalid.", 302, false);
        } else {
            return $this->ApiResponse("Barangay code is valid.", 201, true, ["barangay"=> $barangay]);
        }

    }
}
