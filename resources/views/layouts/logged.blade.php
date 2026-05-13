<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.min.css') }}" />
		<link rel="icon" type="image/png" href="{{ asset('assets/images/review-boost-icon.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

		@include('partials.clarity')

    </head>
    <body class="font-sans antialiased dashboard">
        <div class="min-h-screen bg-gray-100">

                @include('layouts.navigation')

            <!-- Page Content -->
            <div class="container">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="position-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                                    <span data-feather="home"></span>
                                    Dashboard
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('clients.index') }}">
                                    <span data-feather="users"></span>
                                    Clients
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('review-requests.index') }}">
                                    <span data-feather="star"></span>
                                    Review Requests
                                    </a>
                                </li>

								<li class="nav-item">
                                    <a class="nav-link" href="{{ route('qrcode') }}">
                                    <span data-feather="grid"></span>
                                    My QR Code
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.index') }}">
                                    <span data-feather="settings"></span>
                                     Settings
                                    </a>
                                </li>

								<li class="nav-item">
                                    <a class="nav-link" href="{{ route('billing') }}">
                                    <span data-feather="feather"></span>
                                     Billing
                                    </a>
                                </li>

								<li class="nav-item">
                                    <a class="nav-link" href="{{ route('complaints.index') }}">
                                    <span data-feather="message-circle"></span> Complaints</a>
                                </li>

								<li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.change-password-form') }}">
                                    <span data-feather="lock"></span>Login Password</a>
                                </li>

                                <li class="nav-item d-flex">
                                    <form class="" method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                            <span style="rotate: 180deg" data-feather="log-out"></span>
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/intlTelInputWithUtils.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/dashboard.js')}}"></script>

        @yield('scripts')

    </body>
</html>
