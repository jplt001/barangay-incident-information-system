<x-guest-layout>
    <x-auth-card page="Signup">
       <x-slot name="logo">
            <x-application-logo/>
       </x-slot>
       <x-slot name="pageheader">
        <h4 class="mb-3 f-w-400">Signin</h4>
       </x-slot>
       <form action="{{ route('login') }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
        @csrf
        {{--  Email  --}}
        <x-auth-text-input type="email" id="email" name="email" label="Email address" formgroupclass="mb-3" required floatinglabel=true/>
        {{--  Password  --}}
        <x-auth-text-input type="password" id="password" label="Password" name="password" formgroupclass="mb-4" required floatinglabel=true/>

        {{--  Checkbox  --}}
        <x-auth-text-input type="checkbox" name="remember_me" id="remember_me" label="{{__('Remember me')}}" formgroupclass="text-left mb-4 mt-2"/>

        {{--  <button class="btn-block btn-primary mb-4">Signin</button>  --}}
        <x-primary-button class="btn-block mb-4">
            {{__('Signin')}}
        </x-primary-button>
        <p class="mb-2 text-muted">Forgot password? <a href="{{ route('password.request')}}" class="f-w-400">Reset</a></p>
        <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}" class="f-w-400">Signup</a></p>
       </form>
    </x-auth-card>
</x-guest-layout>