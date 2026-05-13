<x-guest-layout title="Confirm Password - {{ config('appsettings.name') }}" description="Confirm Password - {{ config('appsettings.name') }} to manage invoices, clients, and websites easily.">
     <div class="container">
        <div class="row justify-content-center my-5 py-5 g-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <h1 class="mb-4 pb-4 display-4">Confirm Password</h1>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-warning" />
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Confirm') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
