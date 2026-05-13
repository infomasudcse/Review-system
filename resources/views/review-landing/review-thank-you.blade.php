<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviewBoost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="{{ asset('assets/images/review-boost-icon.png') }}">


    <style>
        body { background-color: #fcfcfc; }
        .btn-google { background-color: #198754; color: white; border: none; }
        .btn-google:hover { background-color: #157347; color: white; transform: translateY(-2px); transition: all 0.2s; }
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .logo-font { font-size: 0.7rem; font-weight: 700; letter-spacing: 2px; color: #ced4da; text-transform: uppercase; }
        .hidden { display: none !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-screen">

    <header class="py-2 px-4 bg-white border-bottom border-light flex justify-content-between">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="logo-font">ReviewBoost</span>
            <span class="badge rounded-pill bg-light text-muted fw-normal">Feedback Portal</span>
        </div>
    </header>

    <main class="flex-grow-1 d-flex align-items-center justify-content-center px-3 py-5">
        <div class="container" style="max-width: 500px;">
            <div class="text-center mb-5">
                <h1 class="h3 fw-bold text-dark">Thank you.</h1>
                <p class="text-secondary">We appreciate your feedback.</p>
				<p class="text-secondary">See you soon.</p>
            </div>
        </div>
    </main>

    <footer class="py-3 bg-white border-top border-light mt-auto">
        <div class="container text-center">
            <p class="logo-font mb-0" style="font-size: 0.6rem;">
                Powered by <a href="{{ url('/') }}" class="text-decoration-none text-secondary">ReviewBoost</a>
            </p>
        </div>
    </footer>


</body>
</html>