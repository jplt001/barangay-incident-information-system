@push("styles")
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css')}}">
@endpush
@push("scripts")
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    
    <script>
        $(document).ready(function(){

            $("#userstable").DataTable({
                ajax: `{{ route('users') }}`,
                columns: [
                    { data: 'id', },
                    { data: 'last_name', },
                    { data: 'first_name', },
                    { data: 'middle_name', },
                    { data: 'email', },
                    { data: 'role', render: (data, q, i, s)=> {
                        if(data.name == "owner") return "Barangay Official";
                        return data.display_name;
                    }},
                    { data: 'id', render: (id, r, q, c)=> {
                        return `
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-outline-info" href="{{ url()->current() }}/${id}" data-toggle="tooltip" data-placement="top" title="View"><i class="feather icon-eye"></i></a>
                            <a class="btn btn-outline-warning" href="{{ url()->current() }}/${id}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather icon-edit"></i></a>
                            <a class="btn btn-outline-danger" href="{{ url()->current() }}/${id}/edit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather icon-trash-2"></i></a>
                        </div>
                        `;
                    }}
                ]
            });
        });
    </script>

@endpush

<x-app-layout pageName="{{ __('Users') }}">
    <x-slot name="breadcrumbs">
        <x-breadcrumb-item label="Users" icon="user" iscurrent=true/>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('users.create') }}"><i class="feather icon-user-plus"></i> {{ __('New User') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="userstable">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Last Name') }}</th>
                                <th>{{ __('First Name') }}</th>
                                <th>{{ __('Middle Name') }}</th>
                                <th>{{ __('Email Address') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('ACTIONS') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>