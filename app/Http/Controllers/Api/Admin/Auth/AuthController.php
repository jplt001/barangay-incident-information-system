<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        
    }

    public function login(Request $request) {
        $request->validate([
            "email"=> "required|exists:users",
            "password"=> "required"
        ]);


        
    }
}
