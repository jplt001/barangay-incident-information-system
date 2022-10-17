@extends("layouts.app-main", ["page"=> "Edit User"])

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Please provide correct informations:</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ url('users')}}/{{$user->id}}" method="POST">
                @csrf
                @method("put")
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="first_name" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                    <label for="floatingName">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="middle_name" placeholder="Middle Name" value="{{ $user->middle_name }}">
                    <label for="floatingName">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="last_name" placeholder="Last Name"  value="{{ $user->last_name }}">
                    <label for="floatingName">Last Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" value="{{ $user->email }}">
                    <label for="floatingEmail"> Email</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" autocomplete="false">
                    <label for="floatingPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="City">
                      <label for="floatingCity">Re-type Password</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="City" value="{{  $user->contact_number }}" name="contact_number">
                      <label for="floatingCity">Contact Number</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="Name of Contact Person In case of emergency" value="{{ $user->incase_of_emergency }}" name="incase_of_emergency">
                      <label for="floatingCity">Name of Contact Person In case of emergency</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" placeholder="Contact Number of contact person"  value="{{ $user->incase_of_emergency_mobile_number }}" name="incase_of_emergency_mobile_number">
                      <label for="floatingCity">Contact Number of contact person</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="POSITION" name="position_id">
                      <option value="">SELECT POSITION</option>

                      @foreach ($positions as $id => $position)
                          <option value="{{ $id }}" {{ $user->position_id === $id ? "selected": ''}}>{{ $position }}</option>
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