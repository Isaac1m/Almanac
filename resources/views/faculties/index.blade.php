@extends('layouts.app')
@section('title', '| Faculties')
@section('styles')
    <link href="{{  asset('css/sidenav.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container well">
	<h3 class="lead">Faculties<br />
        <small>A simple, sheek navigation bar style!</small>
    </h3>
    <br />
    
    <div class="row">
        <div class="col-md-3">
            <nav class="nav-sidebar">
                <ul class="nav">
                @foreach($faculties as $faculty)
                    <li><a href="{{ route('faculties.show', $faculty->id) }}">{{$faculty->name}}</a></li>
                @endforeach
                </ul>
            </nav>
        </div>
       
        <div class="col-md-7 col-md-offset-2">
        
        </div>
    </div>
</div>
@endsection