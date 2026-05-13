@extends('layouts.public')

@section("title", "Frequently Asked Questions - ". config('appsettings.name'))
@section("meta_description", "Find answers about ".config('appsettings.name')."’s invoicing software, client management tools, and website builder. Support for small business owners made simple.")

@section('content')

@include('template-parts.home-hero')

@include('template-parts.faq')

@include('template-parts.general-cta')


@endsection
