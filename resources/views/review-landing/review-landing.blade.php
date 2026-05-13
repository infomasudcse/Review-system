<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review {{ $businessName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="icon" type="image/png" href="{{ asset('assets/images/review-boost-icon.png') }}">

    <style>
        body { background-color: #fcfcfc; }
        .btn-google { background-color: #198754; color: white; border: none; }
        .btn-google:hover { background-color: #157347; color: white; transform: translateY(-2px); transition: all 0.2s; }
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .logo-font { font-size: 0.7rem; font-weight: 700; letter-spacing: 2px; color: #278aec; }
        .hidden { display: none !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-screen">

    <header class="py-4 px-4 bg-white border-bottom border-light flex justify-content-between">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="logo-font">ReviewBoost</span>
            <span class="badge rounded-pill bg-light text-muted fw-normal">Feedback Portal</span>
        </div>
    </header>

    <main class="flex-grow-1 d-flex align-items-center justify-content-center px-3 py-5">
        <div class="container" style="max-width: 500px;">
            <div class="text-center mb-5">
                <h1 class="h3 fw-bold text-dark">How was your visit?</h1>
                <p class="text-secondary">We'd love to hear about your experience at <br><strong>{{ $businessName }}</strong></p>
            </div>

            <div id="selection-area" class="d-grid gap-3">
                <a href="{{ route('log.google', $reviewRequest->id) }}" class="btn btn-google py-4 rounded-4 shadow-sm">
                    <div class="h3 mb-1">⭐⭐⭐⭐⭐</div>
                    <div class="fw-bold text-uppercase small">I'm Happy to Rate on Google</div>
                </a>

                <button onclick="showComplaintView()" class="btn btn-outline-secondary py-3 rounded-4 border-2">
                    I have a complaint / feedback
                </button>
            </div>

            <div id="complaint-area" class="card card-custom p-4 hidden">
					<button onclick="showSelectionView()" class="btn btn-outline-secondary p-2 text-decoration-none mb-5">
                            &larr; Back to options
                     </button>

                @if($alreadyComplained)
					<div class="card card-custom p-5 text-center bg-white">
						<div class="mb-3 text-success">
							<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
							<path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
							<path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
							</svg>
						</div>
						<h2 class="h4 fw-bold text-dark">Feedback Received.</h2>
						<p class="text-muted">
							You have already submitted a feedback for this visit.
							{{ $businessName }} team is currently reviewing your feedback.
						</p>
						<div class="mt-3">
							<a href="{{ route('log.google', $reviewRequest->id) }}" class="text-decoration-underline text-muted small">
								Write a public Google review
							</a>
						</div>
					</div>

				@else

				<h2 class="h5 fw-bold mb-1">Tell us what happened</h2>
                <p class="text-muted small mb-4">Your message goes directly to the manager.</p>

                <form action="{{ route('complaints.store') }}" method="POST">
                    @csrf
                    @honeypot
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <input type="hidden" name="tokenId" value="{{ $reviewRequest->tokenId }}">

					@if (!$reviewRequest->tokenId)
						<div class="mb-3">
							<input type="text" name="name" class="form-control border-light-subtle rounded-3"
									placeholder="{{ $client->id }}" required>
						</div>
					@endif

                    <div class="mb-3">
                        <textarea name="message" class="form-control border-light-subtle rounded-3"
                                  rows="4" placeholder="Please describe your experience..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark py-3 rounded-3 fw-bold">
                            Send feedback directly to the business
                        </button>
						<div class="text-sm text-mute">Your message is private and seen only by management</div>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="{{ route('log.google', $reviewRequest->id) }}" class="text-decoration-underline text-muted" style="font-size: 0.75rem;">
                            Write a public Google review
                        </a>
                    </div>
                </form>

				@endif
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

    <script>
        function showComplaintView() {
            document.getElementById('selection-area').classList.add('hidden');
            document.getElementById('complaint-area').classList.remove('hidden');
        }

		function showSelectionView() {
            document.getElementById('selection-area').classList.remove('hidden');
            document.getElementById('complaint-area').classList.add('hidden');
        }
    </script>
</body>
</html>