<x-app-layout pageName="{{ __('New Resident')}}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Residents" href="{{ route('residents') }}" icon="user"/>
        <x-breadcrumb-item label="New Resident" icon="user-plus" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4 class="card-title"> <i class="feather icon-user-plus"></i> {{ __('New Resident') }}</h4>
                </div>
                <div class="card-body">

                        {{--  Basic Information  --}}
                        <h5>Basic Information</h5>
                        <br>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-4 fill">
                                <label for="first_name" class="floating-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $resident->first_name }}" readonly>
                                @error("first_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="middle_name" class="floating-label">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" value="{{ $resident->middle_name }}" class="form-control" readonly>
                                @error("middle_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 fill">
                                <label for="last_name" class="floating-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $resident->last_name }}" readonly>
                                @error("last_name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--  Contact Information  --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 fill">
                                <label for="email" class="floating-label">Email address</label>
                                <input type="text" name="email" id="email" class="form-control" autocomplete="email" value="{{ $resident->email }}" readonly>
                                @error("email")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="contact_number" class="floating-label">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $resident->contact_number }}" readonly autocomplete="mobile">
                                @error("contact_number")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        @role(["super-admin", "admin"])
                        <h5>{{ __("Resident's Barangay Information") }}</h5>
                        <br>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 fill">
                                <label for="email" class="floating-label">{{ __('Barangay') }}</label>
                                <input type="text" name="email" id="email" class="form-control" autocomplete="email" value="{{ $resident->barangay->name }}" readonly>
                            </div>
                            <div class="form-group col-md-6 fill">
                                <label for="contact_number" class="floating-label">Address</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ !is_null($resident->barangay->address) ? $resident->barangay->address : ' ' }}" readonly autocomplete="mobile">
                                @error("contact_number")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endrole
                        <input type="hidden" name="barangay_id" value="{{ auth()->user()->barangay_id }}">
                        
                        <div class="form-group text-center">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary has-ripple">{{ __('Back') }}</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>