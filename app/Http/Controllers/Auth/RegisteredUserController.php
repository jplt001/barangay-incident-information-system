<?php

namespace App\Http\Controllers\Auth;

use App\Events\BarangaySosAlertEvent;
use App\Models\User;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            // 'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $barangayName = $request->first_name."'s Barangay";
        $barangayAddress = "--";

        $barangay = Barangay::create([
            Barangay::FIELD_NAME => $barangayName,
            Barangay::FIELD_ADDRESS1 => $barangayAddress,
            Barangay::FIELD_LATITUDE => 0.00,
            Barangay::FIELD_LONGITUDE => 0.00,
        ]);
        
        $user = User::create([
            User::FIELD_FIRST_NAME => $request->first_name,
            User::FIELD_MIDDLE_NAME => ($request->has("middle_name")) ? $request->middle_name : ' ',
            User::FIELD_LAST_NAME => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            User::FIELD_BARANGAY_ID=> $barangay->id,
        ]);

        $user->assignRole("owner");

        event(new Registered($user));
        // event(new BarangaySosAlertEvent(""));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
