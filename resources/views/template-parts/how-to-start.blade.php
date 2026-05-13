<section class="my-xl-7 py-5 get-start">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 col-md-12 text-center">
                <div class="mb-xl-7 mb-5">
                    <h2 class="mb-3">How to Get Started with {{ config('appsettings.name') }}</h2>
                    <p class="mb-3">Getting started with {{ config('appsettings.name') }} is quick and effortless. In just a few minutes, you can register your account, complete a simple one-time setup, and begin managing invoices, clients, and websites from one powerful dashboard.</p>
                    <p class="mb-0">Whether you’re a freelancer, small business owner, or growing team, {{ config('appsettings.name') }} is designed to save you time, reduce mistakes, and keep everything organized. No complicated setup, no steep learning curve — just sign up and start managing smarter today.</p>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl">
            <div class="row pb-4 pb-lg-0 me-5 me-lg-0 mt-4 mt-lg-2">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="p-xl-5">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="icon-xl icon-shape rounded-circle bg-primary border border-primary-subtle border-4 text-white-stable fw-semibold fs-3">1</div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32"
                                    fill="currentColor"
                                    class="bi bi-arrow-right text-body-tertiary"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </span>
                        </div>

                        <h3 class="h4">Register Free</h3>
                        <p class="mb-0">Create your free {{ config('appsettings.name') }} account in seconds. No credit card required.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="p-xl-5">
                        <div
                            class="d-flex align-items-center justify-content-between mb-5">
                            <div
                                class="icon-xl icon-shape rounded-circle bg-primary border border-primary-subtle border-4 text-white-stable fw-semibold fs-3">
                                2</div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32"
                                    fill="currentColor"
                                    class="bi bi-arrow-right text-body-tertiary"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </span>
                        </div>

                        <h3 class="h4">One-Time Setup</h3>
                        <p class="mb-0">Add your business details, clients, and services just once. We’ll handle the rest.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="p-xl-5">
                        <div
                            class="d-flex align-items-center justify-content-between mb-5">
                            <div
                                class="icon-xl icon-shape rounded-circle bg-primary border border-primary-subtle border-4 text-white-stable fw-semibold fs-3">
                                3</div>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill text-success"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </span>
                        </div>

                        <h3 class="h4">Start Using & Upgrade Anytime</h3>
                        <p class="mb-0">Begin sending invoices, managing clients, or building your website. After your free trial, choose a plan that fits your business — upgrade only when you’re ready.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center my-5">
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Get Started Free</a>
                </div>
            </div>
        </div>
    </div>
</section>
