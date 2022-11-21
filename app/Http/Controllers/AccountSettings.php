<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountSettings extends Controller
{
    //
    
    public function index() {
        $settings = [];
        return view("settings.index")->with("settings", $settings);
    }
}
