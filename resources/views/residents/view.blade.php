<x-app-layout>
    <div class="row">
        <div class="col-8">
            <x-card>
                <x-card-header :cardTitle="__('Resident Information')">
                </x-card-header>
                <x-card-body class="p-2">
                    <div class="row">
                        <div class="col-12">
                            <img class="rounded mx-auto d-block" src="{{ asset('assets/img/profile-img.jpg') }}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-center">
                            <h1 class="display-6"><u>{{ $resident->first_name}}</u></h1>
                        </div>
                        <div class="col-4 text-center">
                            <h1 class="display-6"><u>{{ $resident->middle_name}}</u></h1>
                        </div>
                        <div class="col-4 text-center">
                            <h1 class="display-6"><u>{{ $resident->last_name}}</u></h1>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-center">
                            <h4>
                                <b>Email:</b> {{ $resident->first_name}}
                            </h4>
                        </div>
                        <div class="col-6 text-center">
                            <h4>
                               <b>{{ __('Contact #:') }}</b>
                                    {{ $resident->first_name}}
                            </h4>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-center">
                            <h4>
                                <b>Gender:</b> {{ $resident->gender}}
                            </h4>
                        </div>
                        <div class="col-6 text-center">
                            <h4>
                               <b>{{ __('Birthdate:') }}</b>
                                    {{ $resident->birthdate}}
                            </h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>{{ __('Address 1') }}</h4>
                        <textarea readonly class="form-control"> {{ $resident->address1}}</textarea>
                    </div>
                    <div class="form-group">
                        <h4>{{ __('Address 2') }}</h4>
                        <textarea readonly class="form-control"> {{ $resident->address2}}</textarea>
                    </div>
                </x-card-body>
            </x-card>
        </div>
        <div class="col-4">
            <x-card>
                <x-card-header :cardTitle="_('Incident Reports')">
                    <x-table class="table-stripped">
                    </x-table>
                </x-card-header>
            </x-card>
        </div>
    </div>
</x-app-layout>