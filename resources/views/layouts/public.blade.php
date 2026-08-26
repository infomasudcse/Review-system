<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/simplebar.min.css') }}" >
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/scrollCue.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

		<link rel="icon" type="image/png" href="{{ asset('assets/images/review-boost-icon.png') }}">
        <title>@yield("title", "ReviewBoost | Automate Your Reviews")</title>
        <meta name="description" content="@yield('meta_description', 'The easiest way to get more Google reviews.')">
		<meta property="og:title" content="@yield('title')">
		<meta property="og:description" content="@yield('meta_description')">
		<meta property="og:image" content="{{ asset('assets/images/review-boost-logo.png') }}">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:type" content="website">
		<meta name="robots" content="@yield('meta_robots', 'index, follow')">

		<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "SoftwareApplication",
		"name": "ReviewBoost",
		"operatingSystem": "WEB",
		"applicationCategory": "BusinessApplication",
			"offers": {
				"@type": "Offer",
				"price": "29.00",
				"priceCurrency": "USD"
			}
		}
		</script>


		@include('partials.clarity')

   </head>
   <body>

       @include('template-parts.header')

      <main>

        @yield('content')

      </main>

      @include('template-parts.footer')

      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
      <script src="{{ asset('assets/js/headhesive.min.js') }}"></script>
      <script src="{{ asset('assets/js/theme.min.js') }}"></script>
      <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
      <script src="{{ asset('assets/js/parallax.js') }}"></script>
      <script src="{{ asset('assets/js/rellax.min.js') }}"></script>
      <script src="{{ asset('assets/js/rellax.js') }}"></script>
      <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/swiper.js') }}"></script>
      <script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
      <script src="{{ asset('assets/js/scrollcue.js') }}"></script>
      <script src="{{ asset('assets/js/pricing.js') }}"></script>
	  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</body>
</html>