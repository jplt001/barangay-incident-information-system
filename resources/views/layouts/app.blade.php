<!DOCTYPE html>
<html lang=" en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @unlessrole("admin|super-admin")
    <meta name="setup-finished" content="{{ (auth()->user()->barangay->setup_finished  == 1) ? true : false}}">
    <meta name="barangay-id" content="{{ auth()->user()->barangay_id }}">
    @endunlessrole
    
    <meta name="app_debug" content="{{ config('app.debug', false) }}"/>
    <meta name="rls" content="{{ auth()->user()->getRoleNames()->first() }}"/>

    <title>{{ config('app.name', 'Barangay Incident Management System') }} | {{ isset($attributes['pageName']) ? $attributes['pageName'] : 'Dashboard' }} </title>
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css')}}">
    <style>
        span.required-asterisk {
            color: red!important;
            font-weight: bold;
            margin-left: 3px;
        }

        span.optional-field{
            color: gray!important;
            font-style: italic;
            margin-left: 3px;
            
        }
    </style>
    @stack("styles")
</head>
<body class="">
    {{--  Pre-loader Start  --}}
    <x-loader-bg/>
    {{--  Pre-loader End  --}}

    @include("layouts.navigation")

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            {{--  [ breadcrumb ] start  --}}
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">{{ isset($attributes['pageName']) ? $attributes['pageName'] : 'Dashboard' }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>

                                {{$breadcrumbs}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{--  [ breadcrumb ] end   --}}
            {{$slot}}
        </div>
        
    </div>

    {{--  Required Js  --}}
    <script src="{{ asset('assets/js/jquery.js')}}"></script>

    <script src="{{ asset('assets/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('assets/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/assets/js/ripple.js')}}"></script>
    <script src="{{ asset('assets/assets/js/pcoded.min.js')}}"></script>


    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{ asset('assets/js/pusher-app.js') }}"></script>
    
    @stack("scripts")
</body>
</html>