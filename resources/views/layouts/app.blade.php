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
        input:read-only {
            background-color: white!important;
            cursor: pointer;
            padding: 5px;
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


    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDo7cFwE0yLFXnAADn93SxvgdbdnGgaWbc",
            authDomain: "barangayincidentms.firebaseapp.com",
            projectId: "barangayincidentms",
            storageBucket: "barangayincidentms.appspot.com",
            messagingSenderId: "973000442039",
            appId: "1:973000442039:web:0c02dbdcae325dabb44d32",
            measurementId: "G-NT2WB7E0HQ"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
</body>
</html>