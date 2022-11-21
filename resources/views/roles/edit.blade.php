<x-app-layout pageName="{{ __('Edit Resident')}}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Residents" href="{{ route('residents') }}" icon="user"/>
        <x-breadcrumb-item label="Edit User" icon="user-plus" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title"> <i class="feather icon-user-plus"></i> {{ __('Edit Resident') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('residents.putupdate', ['id'=>$resident->id]) }}" method="post" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                        @csrf
                        @method("put")
                        {{--  Basic Information  --}}
                        <h5>Basic Information</h5>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-4 fill">
                                <label for="first_name" class="floating-label">First Name<x-form.required-asterisk/></label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $resident->first_name) }}" required>
                                @error("first_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="middle_name" class="floating-label">Middle Name<x-form.optional-field/></label>
                                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $resident->middle_name) }}" class="form-control">
                                @error("middle_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="last_name" class="floating-label">Last Name<x-form.required-asterisk/></label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $resident->last_name) }}" required>
                                @error("last_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--  Contact Information  --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 fill">
                                <label for="email" class="floating-label">Email address<x-form.required-asterisk/></label>
                                <input type="text" name="email" id="email" class="form-control" autocomplete="email" value="{{ old('email', $resident->email) }}" required>
                                @error("email")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="contact_number" class="floating-label">Contact Number<x-form.optional-field/></label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $resident->contact_number) }}" required autocomplete="mobile">
                                @error("contact_number")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="form-group col-md-6 fill">
                                <label for="password" class="floating-label">Password<x-form.required-asterisk/></label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" required>
                                @error("password")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="password_confirmation" class="floating-label">Confirm Password<x-form.required-asterisk/></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password" required>
                                @error("password_confirmation")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="barangay_id" value="{{ auth()->user()->barangay_id }}">
                        
                        <div class="form-group text-center">
                            <button class="btn btn-outline-primary has-ripple">{{ __('Update Resident') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>