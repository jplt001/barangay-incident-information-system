<x-app-layout pageName="{{ __('View User') }} - #{{$user->id}}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Users" href="{{ route('users') }}" icon="user"/>
        <x-breadcrumb-item label="View User" icon="user-plus" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                   <div class="row">
                        <div class="col-12 text-center">
                            @if(is_null($user->profile_picture))
                            <img src="{{ asset('assets/img/profile-default-male.png') }}" width="150" height="150" class="img-radius"/>

                            @else
                            <img src="{{ asset('assets/img/favicon (1).png') }}" width="150" height="150" alt="default logo" class="img-radius">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.postcreate') }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                        @csrf
                        
                        {{--  Basic Information  --}}
                        <h5>Basic Information</h5>
                        <br>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4 fill">
                                <label for="first_name" class="floating-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" readonly>
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="middle_name" class="floating-label">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" value="{{ $user->middle_name }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="last_name" class="floating-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}" readonly>
                            </div>
                        </div>
                        <h5>Contact Information</h5>
                        {{--  Contact Information  --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 fill">
                                <label for="email" class="floating-label">Email address</label>
                                <input type="text" name="email" id="email" class="form-control" autocomplete="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="contact_number" class="floating-label">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ is_null($user->contact_number) ? '  ': $user->contact_number }}" readonly>
                            </div>
                        </div>
                        
                        <h5>Account Configuration</h5>
                        <br>
                        <div class="form-group">
                            <label for="role" class="floating-label">Role </label>
                            <input type="text" class="form-control" value="{{$user->role}}" readonly>
                        </div>
                        
                        <div class="form-group text-center">
                            <a class="btn btn-outline-primary has-ripple" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>