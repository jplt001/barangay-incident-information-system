@extends("layouts.app-main", ["page"=> "Create New User"])

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Please provide correct informations:</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ url('users')}}" method="POST">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                  <h4 class="alert-heading">
                    Field errors:
                  </h4>
                  <ul>
                  @foreach ($errors->all() as $message)
                    <li>{{ $message}}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                @endif
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                    <label for="floatingName">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}">
                    <label for="floatingName">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                    <label for="floatingName">Last Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" value="{{ old('email') }}">
                    <label for="floatingEmail"> Email</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="City" name="password_confirmation">
                      <label for="floatingCity">Re-type Password</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="Contact number" name="contact_number" value="{{ old('contact_number') }}">
                      <label for="floatingCity">Contact Number</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" name="incase_of_emergency_" placeholder="Name of Contact Person In case of emergency" value="{{ old('incase_of_emergency') }}">
                      <label for="floatingCity">Name of Contact Person In case of emergency</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="City" name="incase_of_emergency_mobile_number" value="{{ old('incase_of_emergency_mobile_number') }}">
                      <label for="floatingCity">Contact Number of contact person</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Position">
                      <option value="">SELECT POSITION</option>
                      @foreach ($positions as $id => $position)
                          <option value="{{ $id }}" {{ old('position_id') === $id ? "selected": '' }}>{{ $position }}</option>
                      @endforeach
                    </select>
                    <label for="floatingSelect">Position</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
    </div>
</div>
@endsection