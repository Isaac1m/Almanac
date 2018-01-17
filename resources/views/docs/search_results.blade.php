@extends('layouts.app')

@section('content')
    @include('partials._secondaryNav')
    @if(isset($results))
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
           
            <div class="panel-heading text-center">Showing results for <strong>{{ $query }} </strong></div>
        
                {{--  <ul class="list-group no-decoration">
                @foreach($results as $document)
                    <a href="{{ route('documents.show', $document->id)}}">
                        <li class="list-group-item" >{{ $document->title }} - <span> <small> {{ $document->author }} </small> </span>
                        </li>
                    </a>
                @endforeach
                </ul>  --}}
            
        <div class="panel-body">
            @foreach($results as $document)
                <div class="col-md-6 col-md-offset-2">
                    <div class="slicy-well">
                        <li class="list-group-item slicy-cards">
                            <p class="title">
                                <a class="no-decoration" href="{{ route('documents.show', $document->id) }}"> 
                                {!! substr($document->title, 0,50) !!} {{ strlen($document->title) > 50 ? "..." : ""}} 
                                </a>
                                <small style="margin-right:5px;">by</small> <strong> {{ $document->author }} </strong>
                            </p>
                        </li>
                    </div>
                </div>
            @endforeach
             </div>
            </div>
        </div>
    @elseif($message)

    <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron search_res">
            <div class="container">
                <h1 class="not-found-msg text-center">;)</h1> <p class="text-center"> {{ $message }}</p>
                        <form method="POST" action="{{ route('search') }}" class="jumbtron-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for..." name="query">
                                        <span class="input-group-btn">
                                            <input  class="btn btn-default" type="submit" value="Go!">
                                        </span>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
                        </form>
            </div>
        </div>
    </div>
    
    @endif  

@endsection