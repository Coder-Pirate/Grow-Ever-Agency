<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
	<meta charset="utf-8">
	<title>Wallet - Payday Loan Service Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">

  <!-- theme meta -->
  <meta name="theme-name" content="wallet" />

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

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

<div class="modal applyLoanModal fade" id="applyLoan" tabindex="-1" aria-labelledby="applyLoanLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h4 class="modal-title" id="exampleModalLabel">How much do you need?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="myForm" action="{{ route('submit.contact') }}" method="post"  enctype="multipart/form-data">
            @csrf
        <div class="form-group mb-4 pb-2">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control shadow-none" id="name"  required >
        </div>
        <div class="form-group mb-4 pb-2">
            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
            <input type="number" name="phone" class="form-control shadow-none" id="phone" required>
        </div>
        <div class="form-group mb-4 pb-2">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control shadow-none" id="email" required >
        </div>
        <div class="form-group mb-4 pb-2">
            <label for="exampleFormControlInput1" class="form-label">Select A Service</label>

            <select name="service_id" class="form-select mb-3" id="service_id" style="color: #040404" required>
                <option value="">Open this select menu</option>
                @foreach ($category as $cat )
                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
              </select>
        </div>
        <div class="form-group mb-4 pb-2">
            <label for="exampleFormControlTextarea1" class="form-label">Write Message</label>
            <textarea class="form-control shadow-none" name="massage" id="massage" rows="3"></textarea>
        </div>
        <button class="btn btn-primary w-100" type="submit">Send Message</button>

    </form>
      </div>
    </div>
  </div>
</div>
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


