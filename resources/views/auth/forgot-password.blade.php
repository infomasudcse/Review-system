<x-guest-layout title="Forgot Password - {{ config('appsettings.name') }}" description="Forgot Password - {{ config('appsettings.name') }} to manage invoices, clients, and websites easily.">
    <div class="container">
        <div class="row justify-content-center my-5 py-5 g-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <h1 class="mb-4 pb-4 display-4">Forgot Password</h1>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-warning" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
