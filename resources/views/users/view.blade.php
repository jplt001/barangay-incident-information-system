
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-card-header class="justify-content-center">
                    <img class="rounded mx-auto d-block" src="{{ asset('assets/img/profile-img.jpg') }}"/>
                    <a href="{{url()->current()}}/edit" class="btn btn-warning btn-xs" title="Edit User" style="position: absolute; right: 1px; top: 2px;">
                        <span class="icon"><i class="ri-edit-box-line"></i></span>
                    </a>
                </x-card-header>
                <x-card-body class="text-center">
                    <h1 class="display-5">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name}} </h1>
                    <div class="row">
                        <div class="col-12">
                            <x-card>
                                <x-list-group>
                                    <x-list-group-item>
                                        <b>Email:</b> <i>{{ $user->email }}</i>
                                    </x-list-group-item>
                                    <x-list-group-item>
                                        <b>Contact Number:</b> <i>{{ is_null($user->contact_number) ? 'N/A' : $user->contact_number }}</i>
                                    </x-list-group-item>
                                    <x-list-group-item>
                                        <b>Position:</b> <i>{{ (!is_null($user->position)) ? $user->position->name : 'Administrator'}}</i>
                                    </x-list-group-item>
                                </x-list-group>
                            </x-card>
                            <br>
                            <h1 class="display-7">Incase of Emergency</h1>
                            <x-card>
                                <x-list-group>
                                    <x-list-group-item>
                                        <b>Contact Person:</b> <i>{{ is_null($user->incase_of_emergency) ? 'N/A' : $user->incase_of_emergency }}</i>
                                    </x-list-group-item>
                                    <x-list-group-item>
                                        <b>Contact Number:</b> <i>{{ is_null($user->incase_of_emergency_mobile_number) ? 'N/A' : $user->incase_of_emergency_mobile_number }}</i>
                                    </x-list-group-item>
                                </x-list-group>
                            </x-card>
                        </div>
                    </div>
                </x-card-body>
            </x-card>
        </div>
    </div>
</x-app-layout>