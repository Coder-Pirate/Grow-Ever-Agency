<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

@php
$siteinfo = App\Models\Siteinfo::find(1);
@endphp

<head>
	<meta charset="utf-8">
	<title>{{ $siteinfo->site_name }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="{{ asset($siteinfo->fabicon) }}" type="image/x-icon">
	<link rel="icon" href="{{ asset($siteinfo->fabicon) }}" type="image/x-icon">

  <!-- theme meta -->
  <meta name="theme-name" content="wallet" />

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/brands.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/solid.css') }}">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

<!-- navigation -->
@include('frontend.body.header')
<!-- /navigation -->


@yield('master')

@include('frontend.body.footer')


<!-- # JS Plugins -->
<script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmenu/scrollmenu.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('frontend/js/script.js') }}"></script>
<script src="{{ asset('frontend/js/validate.min.js') }}"></script>

</body>
</html>


