<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo/>
        </x-slot>
         <x-slot name="pageheader">
            <h4 class="mb-3 f-w-400">Signup</h4>
        </x-slot>
        <form action="{{ route('register') }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
            @csrf
            <x-auth-text-input type="text" id="first_name" name="first_name" label="First Name" value="{{ old('first_name', '') }}" required floatinglabel=true/>
            <x-auth-text-input type="text" id="middle_name" name="middle_name" label="Middle Name" value="{{ old('middle_name', '') }}" floatinglabel=true />
            <x-auth-text-input type="text" id="last_name" name="last_name" label="Last Name" value="{{ old('last_name', '') }}" required floatinglabel=true />
            <x-auth-text-input type="email" id="email" name="email" label="Email address" value="{{ old('email', '') }}" autocomplete="off"  required floatinglabel=true />
            <x-auth-text-input type="password" id="password" name="password" label="Password" autocomplete="new-password"  required floatinglabel=true/>
            <x-auth-text-input type="password" id="password_confirmation" name="password_confirmation" label="Confirm Password" autocomplete="new-password"  required floatinglabel=true/>
           
            <x-primary-button class=" btn-block mb-4">
                {{ __('Sign Up')}}
            </x-primary-button>
            <p class="mb-2">Already have an account? <a href="{{ route('login') }}" class="f-w-400">Signin</a></p>
        </form>
    </x-auth-card>
</x-guest-layout>