<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="JOSEPINO DEV TEAM" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('assets/assets/css/style.css')}}">
	
    <title>{{ config('app.name', 'Laravel') }}</title>
	
	<style>
		.auth-wrapper {
			background-color: #266DD3!important;
		}
	</style>

</head>

{{--  [ auth-signin ] start  --}}
{{$slot}}
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('assets/assets/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('assets/assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/assets/js/ripple.js')}}"></script>
<script src="{{ asset('assets/assets/js/pcoded.min.js')}}"></script>



</body>

</html>
