@extends('layouts.app')
@section('title', '| Faculties')
@if(!(Auth::check()))
    @include('partials._secondaryNav')
@endif
@section('content')

<div class="container well">
    
        <div class="col-md-8 col-md-offset-2">
            
            @foreach($faculties as $faculty)
            
                <div class="row slicy-card col-md-6 col-md-offset-2 well faculty-listing">
                    <a class="no-decoration" href="{{ route('faculties.show', $faculty->id) }}">{{ $faculty->name}} </a>
                    <span class="expand-btn"> <i class="glyphicon glyphicon-chevron-right"> </i> </span>
                </div>
            
            @endforeach
            <div class="col-md-4 col-md-offset-4">
              {{ $faculties->links()}}
            </div>
        <div>
    
</div>
@endsection