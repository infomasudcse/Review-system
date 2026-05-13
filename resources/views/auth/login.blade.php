
<x-guest-layout title="Login | ReviewBoost" description="Access your ReviewBoost account to manage your clients and track your review automation.">

    <div class="container">
			<div class="row justify-content-center my-2 py-2 g-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
    				<x-auth-session-status class="mb-4 alert text-primary" :status="session('status')" />
				</div>
			</div>

	        <div class="row justify-content-center my-5 py-5 g-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <h1 class="mb-4 pb-4 display-4">Login</h1>
                    <form method="POST" action="{{ route('login') }}" class="mb-5">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" class="form-label" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-warning" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label class="form-label" for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-warning" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="form-check-input rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="form-check-label ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">


                            <x-primary-button class="me-3 mb-3 btn btn-primary">
                                {{ __('Log in') }}
                            </x-primary-button>

							 @if (Route::has('password.request'))
                                <a class="mb-3 btn btn-light underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-guest-layout>
