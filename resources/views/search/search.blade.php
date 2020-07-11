@extends('layouts.app')

@section('content')

<div class="container shadow my-4 pt-2 pb-5 bg-white border border-danger rounded-lg">
    <h1 class="text-center">{{count($downResults)}} Results Found In {{$downResults[0]['b_area']}}</h1>
    <h3 class="text-center">{{count($b_catogaries)}} Catogaries Found</h3>
    <hr class="bg-danger shadow-sm">
    <searcher></searcher>
</div>

@endsection