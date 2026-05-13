<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - ReviewBoost</title>
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-card {
            max-width: 450px;
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .logo-text {
            font-size: 0.75rem;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
            color: #adb5bd;
            font-weight: 700;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card error-card p-5 text-center bg-white">

                    <div class="mb-4">
                        <span class="logo-text">ReviewBoost</span>
                    </div>

                    <h1 class="display-1 fw-bold text-light mb-0">404</h1>

                    <div class="mt-2 mb-4">
                        <h2 class="h4 fw-bold text-dark">This link has expired or page not found.</h2>
                        <p class="text-muted small">
                            Please contact the business directly if you still wish to provide feedback.
                        </p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}" class="btn btn-dark btn-lg py-3 rounded-3 shadow-sm fw-bold">
                            Go to Home Page
                        </a>
                    </div>

                    <div class="mt-4">
                        <hr class="my-4 opacity-25">
                        <p class="mb-0 text-muted" style="font-size: 0.7rem;">
                            &copy; {{ date('Y') }} ReviewBoost. All rights reserved.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>