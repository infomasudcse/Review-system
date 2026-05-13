<x-guest-layout title="Verify Password - {{ config('appsettings.name') }}" description="Verify Password - {{ config('appsettings.name') }} to manage invoices, clients, and websites easily.">
    <div class="container">
        <div class="row justify-content-center my-5 py-5 g-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <h1 class="mb-4 pb-4 display-4">Email Verification</h1>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="mb-3">
                            <button type="submit" class="btn btn-light">
                             {{ __('Resend Verification Email') }}
                            </button>

                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-dark">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
