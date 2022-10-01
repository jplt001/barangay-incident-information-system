@extends("layouts.app-main", ["page"=> "Users"])

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                {{ $users->links() }}
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Position</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as  $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->middle_name }}</td>
                                <td>{{ $user->position }}</td>
                                <td>
                                    <a href="{{url()->current() }}/{{$user->id }}" class="btn btn-primary">View</a>
                                    <a href="{{url()->current() }}/{{$user->id }}/edit" class="btn btn-warning">Edit</a>
                                    <a href="{{url()->current() }}/{{$user->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection