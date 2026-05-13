@extends('layouts.public')


@section("title", "Get More Google Reviews for Restaurants | ReviewBoost")
@section("meta_description", "Automatically turn happy diners into 5-star Google reviews using simple follow-ups. No chasing, no awkward asking. Start free today.")


@section('content')

@include('template-parts.home-hero')

@include('template-parts.restaurant-review-problem')

@include('template-parts.restaurant-why-choose-us')

@include('template-parts.how-it-works')

@include('template-parts.why-use-reviews')


@include('template-parts.general-cta')


@endsection
