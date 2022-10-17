@extends("layouts.app-main", ["page"=> "New Resident"])

@section("content")
<div class="row">
    <form action="{{ url('residents') }}" method="POST">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Resident Basic Information</h4>
                </div>
                <div class="card-body p-2">
                    <div class="row needs-validation @error('first_name', 'last_name') was-validated @enderror">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="first_name" id="firstNameInp" class="form-control" placeholder="First Name" value="{{ old('first_name')}}" @error("first_name") required @enderror>
                                <label for="firstNameInp">First Name</label>
                                @error("first_name")
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="middle_name" id="middleNameInp" class="form-control" placeholder="Middle Name" value="{{ old('middle_name') }}" @error("middle_name") required @enderror>
                                <label for="middleNameInp">Middle Name (optional)</label>
                                 @error("middle_name")
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="last_name" id="lastNameInp" class="form-control" placeholder="Last Name" @error("last_name") required @enderror>
                                <label for="lastNameInp">Last Name</label>
                                @error("last_name")
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row needs-validation @error('email', 'contact_number') was-validated @enderror">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" id="firstNameInp" class="form-control" placeholder="Email Address" @error("email") required @enderror >
                                <label for="emailInp">Email Address</label>
                                @error("email")
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="contact_number" id="contactNumberInp" class="form-control" placeholder="Contact Number" @error("contact_number") required @enderror >
                                <label for="contactNumberInp">Contact Number</label>
                                @error('contact_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row needs-validation @error('gender', 'birthdate') was-validated @enderror">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="gender" id="genderSelect" class="form-select">
                                    <option value="">SELECT GENDER</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected': '' }} >Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected': '' }}>Female</option>
                                </select>
                                <label for="genderSelect">Gender</label>
                                @error("gender")
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="birthdate" id="birthDateInp" class="form-control" placeholder="Birth Date" value="{{ old('birthdate') }}" @error("birthdate") required @enderror >
                                <label for="birthDateInp">Birth Date</label>
                                @error('birthdate')
                                <div class="invalid-feedback">{{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row needs-validation @error('address1', 'address2') was-validated @enderror">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="address1" id="address1Inp" class="form-control">{{ old('address1')  }}</textarea>
                                <label for="address1Inp">Address 1</label>
                                @error("gender")
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="address2" id="address2Inp" class="form-control">{{ old('address2')  }}</textarea>
                                <label for="address2Inp">Address 2 (optional)</label>
                                @error("address2")
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection