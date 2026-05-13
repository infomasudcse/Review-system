@extends('layouts.public')

@section("title", "Client Management Software for Small Businesses - ".config('appsettings.name'))
@section("meta_description", "Keep all your customer details, history, and interactions in one place. ".config('appsettings.name')."’s client management tool helps small businesses stay organized and build stronger relationships.")

@section('content')

<section class="container py-lg-8 py-5" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-10 col-12" data-cues="zoomIn" data-group="page-title" data-delay="700" data-disabled="true">
			<div class="text-center d-flex flex-column gap-5" data-cue="zoomIn" data-group="page-title" data-delay="700" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 700ms; animation-direction: normal; animation-fill-mode: both;">
				<!-- <div class="d-none justify-content-center">
				<span class="bg-primary bg-opacity-10 text-primary border-primary border p-2 fs-6 rounded-pill lh-1 d-flex align-items-center">
					<span class="badge bg-primary">New</span>
					<span class="ms-2">Introducing AI Editor</span>
					<span class="ms-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M1 8.89181C1 8.7592 1.05268 8.63202 1.14645 8.53825C1.24021 8.44448 1.36739 8.39181 1.5 8.39181H13.293L10.146 5.24581C10.0521 5.15192 9.99937 5.02458 9.99937 4.89181C9.99937 4.75903 10.0521 4.63169 10.146 4.53781C10.2399 4.44392 10.3672 4.39117 10.5 4.39117C10.6328 4.39117 10.7601 4.44392 10.854 4.53781L14.854 8.53781C14.9006 8.58425 14.9375 8.63943 14.9627 8.70017C14.9879 8.76092 15.0009 8.82604 15.0009 8.89181C15.0009 8.95757 14.9879 9.02269 14.9627 9.08344C14.9375 9.14418 14.9006 9.19936 14.854 9.24581L10.854 13.2458C10.7601 13.3397 10.6328 13.3924 10.5 13.3924C10.3672 13.3924 10.2399 13.3397 10.146 13.2458C10.0521 13.1519 9.99937 13.0246 9.99937 12.8918C9.99937 12.759 10.0521 12.6317 10.146 12.5378L13.293 9.39181H1.5C1.36739 9.39181 1.24021 9.33913 1.14645 9.24536C1.05268 9.15159 1 9.02441 1 8.89181Z" fill="#8B3DFF"></path>
						</svg>
					</span>
				</span>
				</div> -->
				<div class="d-flex flex-column gap-3 mx-lg-8">
				<h1 class="mb-0 display-4">Organize Clients, Track Details, Grow Relationships</h1>
				<p class="mb-0 lead">Manage your clients in one place — from contact info to project details — so you can focus on delivering value.</p>
				</div>
				<div class="d-flex flex-row gap-4 justify-content-center">
				<a href="{{ route('register') }}" class="btn btn-primary">Try Client Manager Free</a>
				<a href="{{ route('features') }}" class="icon-link icon-link-hover">
					<span>Explore Features</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
					</svg>
				</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Feature to boost Start-->
<section class="container py-lg-8 py-5" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center mb-8">
		<div class="col-xl-6 col-lg-10 col-12">
		<div class="text-center d-flex flex-column gap-5">
			<div class="d-flex flex-column gap-3">
				<h2 class="mb-0">Why Use Our Client Management Tool?</h2>
				<p class="mb-0">Keep clients organized. Work smarter. Build better relationships. <br/> Designed for freelancers and small businesses who want all their client details in one place.</p>
			</div>
		</div>
		</div>
	</div>
	<div class="row g-6">
		<div class="col-12" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="border rounded-3 bg-white bg-opacity-25 overflow-hidden">
			<div class="pattern-square"></div>
			<div class="row align-items-center">
				<div class="col-12" data-cue="slideInLeft" data-show="true" style="animation-name: slideInLeft; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
					<div class="p-lg-8 p-5 my-lg-4 d-flex flex-column gap-4">
					<div class="icon-shape icon-xl bg-primary bg-opacity-10 rounded-3 border border-primary">
						<svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none">
							<path d="M13 0.614014C10.4288 0.614014 7.91543 1.37645 5.77759 2.80491C3.63975 4.23337 1.97351 6.26369 0.989572 8.63913C0.0056327 11.0146 -0.251811 13.6284 0.249797 16.1502C0.751405 18.6719 1.98953 20.9883 3.80762 22.8064C5.6257 24.6245 7.94208 25.8626 10.4638 26.3642C12.9856 26.8658 15.5995 26.6084 17.9749 25.6244C20.3503 24.6405 22.3807 22.9743 23.8091 20.8364C25.2376 18.6986 26 16.1852 26 13.614C25.9964 10.1673 24.6256 6.86283 22.1884 4.42565C19.7512 1.98846 16.4467 0.617653 13 0.614014ZM13 24.614C10.8244 24.614 8.69767 23.9689 6.88873 22.7602C5.07979 21.5515 3.66989 19.8335 2.83733 17.8235C2.00477 15.8135 1.78693 13.6018 2.21137 11.468C2.63581 9.33423 3.68345 7.37422 5.22183 5.83584C6.76021 4.29746 8.72022 3.24981 10.854 2.82538C12.9878 2.40094 15.1995 2.61877 17.2095 3.45134C19.2195 4.2839 20.9375 5.6938 22.1462 7.50274C23.3549 9.31168 24 11.4384 24 13.614C23.9967 16.5304 22.8367 19.3264 20.7745 21.3885C18.7123 23.4507 15.9164 24.6107 13 24.614ZM17.7075 11.9065C17.8004 11.9994 17.8741 12.1097 17.9244 12.2311C17.9747 12.3525 18.0006 12.4826 18.0006 12.614C18.0006 12.7454 17.9747 12.8755 17.9244 12.9969C17.8741 13.1183 17.8004 13.2286 17.7075 13.3215C17.6146 13.4144 17.5043 13.4881 17.3829 13.5384C17.2615 13.5887 17.1314 13.6146 17 13.6146C16.8686 13.6146 16.7385 13.5887 16.6171 13.5384C16.4957 13.4881 16.3854 13.4144 16.2925 13.3215L14 11.0278V18.614C14 18.8792 13.8946 19.1336 13.7071 19.3211C13.5196 19.5087 13.2652 19.614 13 19.614C12.7348 19.614 12.4804 19.5087 12.2929 19.3211C12.1054 19.1336 12 18.8792 12 18.614V11.0278L9.70751 13.3215C9.51987 13.5092 9.26537 13.6146 9.00001 13.6146C8.73464 13.6146 8.48015 13.5092 8.29251 13.3215C8.10486 13.1339 7.99945 12.8794 7.99945 12.614C7.99945 12.3486 8.10486 12.0942 8.29251 11.9065L12.2925 7.90651C12.3854 7.81354 12.4957 7.73978 12.6171 7.68945C12.7385 7.63913 12.8686 7.61323 13 7.61323C13.1314 7.61323 13.2615 7.63913 13.3829 7.68945C13.5043 7.73978 13.6146 7.81354 13.7075 7.90651L17.7075 11.9065Z" fill="#8B3DFF"></path>
						</svg>
					</div>
					<div>
						<h3>Centralized Client Records</h3>
						<p class="mb-0 text-body">Store all client details, contacts, and notes in one secure dashboard.</p>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="col-lg-12">
            <div class="text-center my-5">
                <a href="{{ route('register') }}" class="btn btn-outline-primary">Get Started Free</a>
            </div>
        </div>

		<div class="col-lg-6 col-12" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
			<div class="border rounded-3 bg-white bg-opacity-25 overflow-hidden h-100 position-relative">

				<div class="p-lg-8 p-5 d-flex flex-column gap-4">
					<div class="icon-shape icon-xl bg-warning bg-opacity-10 rounded-3 border border-warning">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock-history text-primary" viewBox="0 0 16 16">
                              <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"></path>
                              <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"></path>
                              <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"></path>
                           </svg>
					</div>
					<div>
						<h3>Quick Access Anytime</h3>
						<p class="mb-0 text-body">Find client info instantly — no more digging through emails or spreadsheets.</p>
					</div>
					<!-- <figure>
						<img src="{{ asset('assets/images/feature-2.png') }}" class="img-fluid">
					</figure> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 200ms; animation-direction: normal; animation-fill-mode: both;">
			<div class="border rounded-3 bg-white bg-opacity-25 overflow-hidden h-100 position-relative">

				<div class="p-lg-8 p-5 d-flex flex-column gap-4">
					<div class="icon-shape icon-xl bg-info bg-opacity-10 rounded-3 border border-info">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
						<path opacity="0.2" d="M28 10.614L16 17.614L4 10.614L16 3.61401L28 10.614Z" fill="#0DCAF0"></path>
						<path d="M28.8638 22.1139C28.9958 22.3431 29.0317 22.6153 28.9635 22.8709C28.8954 23.1265 28.7287 23.3447 28.5 23.4777L16.5 30.4777C16.3471 30.5668 16.1733 30.6138 15.9963 30.6138C15.8192 30.6138 15.6454 30.5668 15.4925 30.4777L3.4925 23.4777C3.26712 23.3422 3.10415 23.1235 3.03888 22.8688C2.9736 22.614 3.01128 22.3439 3.14375 22.1167C3.27622 21.8896 3.49282 21.7238 3.74666 21.6552C4.0005 21.5866 4.27114 21.6207 4.5 21.7502L16 28.4564L27.5 21.7502C27.7292 21.6181 28.0014 21.5822 28.257 21.6504C28.5126 21.7186 28.7308 21.8852 28.8638 22.1139ZM27.5 15.7502L16 22.4564L4.5 15.7502C4.27231 15.6368 4.00997 15.6145 3.76638 15.6877C3.5228 15.7609 3.31627 15.9242 3.18884 16.1444C3.06141 16.3645 3.02266 16.6249 3.08046 16.8726C3.13827 17.1203 3.28829 17.3367 3.5 17.4777L15.5 24.4777C15.6529 24.5668 15.8267 24.6138 16.0037 24.6138C16.1808 24.6138 16.3546 24.5668 16.5075 24.4777L28.5075 17.4777C28.6228 17.4125 28.7239 17.325 28.8051 17.2204C28.8863 17.1158 28.9459 16.9961 28.9804 16.8682C29.015 16.7404 29.0238 16.607 29.0064 16.4757C28.9889 16.3444 28.9456 16.2179 28.8789 16.1035C28.8122 15.9891 28.7234 15.8891 28.6177 15.8093C28.5121 15.7295 28.3916 15.6715 28.2633 15.6386C28.135 15.6057 28.0015 15.5987 27.8705 15.6178C27.7394 15.637 27.6135 15.682 27.5 15.7502ZM3 10.6139C3.0004 10.4388 3.04679 10.2668 3.13454 10.1152C3.22229 9.96362 3.34831 9.83774 3.5 9.75016L15.5 2.75016C15.6529 2.661 15.8267 2.61401 16.0037 2.61401C16.1808 2.61401 16.3546 2.661 16.5075 2.75016L28.5075 9.75016C28.6585 9.83823 28.7837 9.96433 28.8707 10.1159C28.9578 10.2674 29.0036 10.4391 29.0036 10.6139C29.0036 10.7887 28.9578 10.9604 28.8707 11.1119C28.7837 11.2635 28.6585 11.3896 28.5075 11.4777L16.5075 18.4777C16.3546 18.5668 16.1808 18.6138 16.0037 18.6138C15.8267 18.6138 15.6529 18.5668 15.5 18.4777L3.5 11.4777C3.34831 11.3901 3.22229 11.2642 3.13454 11.1126C3.04679 10.961 3.0004 10.7891 3 10.6139ZM5.985 10.6139L16 16.4564L26.015 10.6139L16 4.77141L5.985 10.6139Z" fill="#0DCAF0"></path>
						</svg>
					</div>
					<div>
						<h3>Linked to Invoicing</h3>
						<p class="mb-0 text-body">Add clients once, and their info auto-fills into invoices, saving time.</p>
					</div>
					<!-- <figure>
						<img src="{{ asset('assets/images/feature-2.png') }}" class="img-fluid">
					</figure> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
			<div class="border rounded-3 bg-white bg-opacity-25 overflow-hidden h-100 position-relative">

				<div class="p-lg-8 p-5 d-flex flex-column gap-4">
					<div class="icon-shape icon-xl bg-warning bg-opacity-10 rounded-3 border border-warning">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill text-primary" viewBox="0 0 16 16">
                              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path>
                           </svg>
					</div>
					<div>
						<h3>Stay Organized & Efficient</h3>
						<p class="mb-0 text-body">Sort, search, and filter clients with ease.</p>
					</div>
					<!-- <figure>
						<img src="{{ asset('assets/images/feature-2.png') }}" class="img-fluid">
					</figure> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 200ms; animation-direction: normal; animation-fill-mode: both;">
			<div class="border rounded-3 bg-white bg-opacity-25 overflow-hidden h-100 position-relative">

				<div class="p-lg-8 p-5 d-flex flex-column gap-4">
					<div class="icon-shape icon-xl bg-info bg-opacity-10 rounded-3 border border-info">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                              <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                           </svg>
					</div>
					<div>
						<h3>Made for Small Teams & Freelancers</h3>
						<p class="mb-0 text-body">Lightweight, easy-to-use, no bloated CRM complexity.</p>
					</div>
					<!-- <figure>
						<img src="{{ asset('assets/images/feature-2.png') }}" class="img-fluid">
					</figure> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--Feature to boost end-->

@include('template-parts.how-to-start')

<!--Call to action start-->
<section class="container mb-lg-8 py-lg-8 py-5" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row g-0">
		<div class="col-12">
		<div class="bg-gray-900 rounded-3 py-5">
			<div class="row align-items-center">
				<div class="offset-xl-1 col-xl-4 col-lg-12">
					<div class="d-flex flex-column gap-4 p-6 p-xl-0">
					<div>
						<h2 class="text-white-stable">Start Managing Your Clients Today</h2>
						<p class="mb-0 me-lg-8">Keep all your client details, notes, and history in one secure place. Stay organized and save time. No spreadsheets required.</p>
					</div>
					<div>
						<a href="{{ route('register') }}" class="btn btn-primary">Get Started for free</a>
					</div>
					<div>
						<ul class="list-inline">
							<li class="list-inline-item">
								<span><i class="bi bi-check2-circle fs-4 text-white"></i></span>
								<span class="ms-1">No credit card required</span>
							</li>
							<li class="list-inline-item">
								<span><i class="bi bi-check2-circle fs-4 text-white"></i></span>
								<span class="ms-1">Manage unlimited clients</span>
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="offset-xl-1 col-xl-5 col-lg-12">
					<div class="pt-xl-8 d-none d-xl-block">
						<img src="{{ asset('assets/images/client-management.png') }}" class="img-fluid w-xxl-100">
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>
<!--Call to action end-->
@endsection
