{{--  STYLES  --}}
@push("styles")
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/jquery.dataTables.min.css')}}">
@endpush

{{--  SCRIPTS  --}}
@push("scripts")
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#usersTable").DataTable({
            ajax: "{{ url()->current() }}?e=ajax",
            columns: [
                { data: 'id', },
                { data: 'last_name', },
                { data: 'first_name', },
                { data: 'middle_name', },
                { data: 'email', },
                { data: 'position', },
                { data: 'id', render: (data, q, i, w)=> {
                    return `<div class="btn-group" role="group">
                                <a class="btn btn-info" href="{{url()->current()}}/${data}"><span class="icon"><i class="ri-eye-line"></i></span></a>
                                <a class="btn btn-warning" href="{{url()->current()}}/${data}/edit"><span class="icon"><i class="ri-edit-box-line"></i></span></a>
                                <a class="btn btn-danger" href="{{url()->current()}}/${data}"><span class="icon"><i class="ri-delete-bin-5-line"></i></span></a>
                                <a class="btn btn-secondary" href="{{url()->current()}}/${data}"><i class="ri-user-unfollow-line"></i></a>    
                            </div>`;
                } },
            ]
        })
    })
</script>
@endpush

<x-app-layout>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-card-header :cardTitle="__('List of Users')" class="position-relative">
                    <x-card-header-tools>
                        <a href="{{url()->current()}}/create" class="btn btn-info btn-sm" style="translate: 100%;"><i class="ri-user-add-line"></i>{{ __(' New User')}}</a>
                    </x-card-header-tools>
                </x-card-header>
                <x-card-body class="p-1">
                    <x-table-datatables id="usersTable">
                        <x-table-datatables-thead>
                            <tr>
                                <th>No.</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>ACTIONS</th>
                            </tr>
                        </x-table-datatables-thead>
                    </x-table-datatables>
                </x-card-body>
            </x-card>
        </div>
    </div>
</x-app-layout>

