@props(['title' => config('appsettings.name'), 'description' => ''])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			  <!-- Required meta tags -->

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

		<!-- Libs CSS -->
		<link href="{{ asset('assets/css/simplebar.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">

		<!-- Scroll Cue -->
		<link rel="stylesheet" href="{{ asset('assets/css/scrollCue.css') }}">

		<!-- Box icons -->
		<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<!-- Favicon icon-->
		<link rel="icon" type="image/png" href="{{ asset('assets/images/review-boost-icon.png') }}">

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

	@include('partials.clarity')

   </head>
   <body>

       @include('template-parts.header')

      <main>

          {{ $slot }}

      </main>

        @include('template-parts.footer')


      <!-- Libs JS -->
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
      <script src="{{ asset('assets/js/headhesive.min.js') }}"></script>

      <!-- Theme JS -->
      <script src="{{ asset('assets/js/theme.min.js') }}"></script>

      <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
      <script src="{{ asset('assets/js/parallax.js') }}"></script>
      <script src="{{ asset('assets/js/rellax.min.js') }}"></script>
      <script src="{{ asset('assets/js/rellax.js') }}"></script>
      <!-- Swiper JS -->
      <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/swiper.js') }}"></script>
      <script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
      <script src="{{ asset('assets/js/scrollcue.js') }}"></script>
      <script src="{{ asset('assets/js/pricing.js') }}"></script>
	  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>


</body>
</html>
