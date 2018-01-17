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
                    <li>
                    <p class="faculty-name">{{$faculty->name}}
                     <button class="btn btn-xs expand-btn" onClick="showContent()"> <i class="glyphicon glyphicon-expand"> </i> </button>
                    </p>
                    {{--  <a href="{{ route('faculties.show', $faculty->id) }}"></a>   --}}
                   
                    </li>
                @endforeach
                </ul>
            </nav>
        </div>
       
        <div class="col-md-7 col-md-offset-2" id="content_area">
         
         <div class="row">
            <div class="slicy-well">
                <li class="list-group-item slicy-cards">
                    <p class="title">
                        <a class="no-decoration" href="#"> 
                            Dept. Name
                        </a>
                    </p>
                </li>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    var showContent = function()
    {
         var content_area = document.getElementById('content_area');
        content_area.innerHTML = "This is my content";
    }
       
    </script>
@endsection