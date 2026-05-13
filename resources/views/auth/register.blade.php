<x-guest-layout title="Create Your ReviewBoost Account | Get Started for Free" description="Join ReviewBoost today. Start automating your Google reviews and get your first 20 clients for free. No credit card required to start.">
    <div class="container">
        <div class="row justify-content-center my-5 py-5 g-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <p class="p-0 m-0 fst-italic text-primary">Free</p>
                <h1 class="mb-4 pb-4 display-5">Get an account</h1>

                <form method="POST" action="{{ route('register') }}" class="mb-5 register-form">
                    @csrf
					@honeypot

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" class="form-label" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full  form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-warning" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full  form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-warning" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password"  class="form-label" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-warning" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation"  class="form-label"  :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-warning" />
                    </div>

					<div class="cf-turnstile mt-4" data-sitekey="{{ config('services.cloudflare.key') }}"></div>
					@error('cf-turnstile-response')
						<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
					@enderror

                    <div class="flex items-center justify-end mt-4">


                        <x-primary-button class="me-4 mb-3 btn btn-primary">
                            {{ __('Register') }}
                        </x-primary-button>

						 <a class="mb-3 btn btn-light underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
