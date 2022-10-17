<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request) {
        $request->validate([
            "email"=> "required|exists:residents,email",
            "password"=> "required"
        ]);


        $user = Resident::where(Resident::FIELD_EMAIL, $request->email)->first();
        $token = "";

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // if(!$token) {
        //     return $this->ApiResponse(["error"=> "Unauthorized"], 401);
        // } 
        
        // $user = Auth::guard("api")->user();
        $token = $user->createToken(env("SANCTUM_SECRET"))->plainTextToken;

        return $this->ApiResponse(["user"=> $user, "token"=>$token], 201);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            // 'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            Resident::FIELD_CONTACT_NUMBER => 'required|max:11',
            Resident::FIELD_BIRTHDATE => 'required|date',
            'password' => 'required|string|min:6',
        ]);

        $data  = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['address1'] = '  ';
        $user = Resident::create($data);

        $token = Auth::guard("api")->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout(Request $request)
    {

        $user = $request->user();

        $user->tokens()->delete();
        
        return $this->ApiResponse([
            'status' => 'success',
            "code"=> 200,
            'message' => 'Successfully logged out',
        ]);
    }

    public function me(Request $request) {

        $user = $request->user();

        return $this->ApiResponse(["message"=> "Fetch your updated details.", "user"=> $user], 200);

    }

    public function refresh(Request $request)
    {

        $user = $request->user();
        $user->tokens()->delete();
        $token = $user->createToken(env("SANCTUM_SECRET"))->plainTextToken;

        return $this->ApiResponse(["user" => $user, "token" => $token], 201);
        // return response()->json([
        //     'status' => 'success',
        //     'user' => Auth::guard("api")->user(),
        //     'authorisation' => [
        //         'token' => Auth::guard("api")->refresh(),
        //         'type' => 'bearer',
        //     ]
        // ]);
    }
}
