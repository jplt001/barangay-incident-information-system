@push("styles")
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/jquery.dataTables.min.css')}}">
@enpush

@push("scripts")
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.datatables').DataTable({
            ajax: '{{ url()->current() }}?e=ajax',
            columns: [
                {data: 'resident_name', render: (data, q, i,w)=> {
                    const id = i.id;
                    return `<a href="{{url('residents')}}/${id}">${data}</a>`;
                }},
                {data: 'email'},
                {data: 'contact_number'},
                {data: 'gender'},
                {data: 'registered_at'},
                {data: 'id', render: (data, q, i, w)=> {


                    return `<div class="btn-group" role="group">
                            <a class="btn btn-warning" href="{{url()->current()}}/${data}/edit"><span class="icon"><i class="ri-edit-box-line"></i></span></a>
                            <a class="btn btn-danger" href="{{url()->current()}}/${data}"><span class="icon"><i class="ri-delete-bin-5-line"></i></span></a>
                            <a class="btn btn-secondary" href="{{url()->current()}}/${data}"><i class="ri-user-unfollow-line
 "></i></a>
                            </div>`;
                }},
            ]
        });
    })
</script>
@endpush

<x-app-layout>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-card-header :cardTitle="__('List of Residents')" class="position-relative">
                    <x-card-header-tools>
                        <a href="{{ url()->current() }}/create" class="btn btn-info">New Resident</a>
                    </x-card-header-tools>
                </x-card-header>
                <x-card-body>
                    <x-table-datatables class="datatables">
                        <x-table-datatables-thead>
                            <tr>
                                <th>Resident Name</th>
                                <th>Email Address</th>
                                <th>Contact Number</th>
                                <th>Gender</th>
                                <th>Registered At</th>
                                <th>ACTIONS</th>
                            </tr>
                        </x-table-datatables-thead>
                    </x-table-datatables>
                </x-card-body>
            </x-card>
        </div>
    </div>
</x-app-layout>