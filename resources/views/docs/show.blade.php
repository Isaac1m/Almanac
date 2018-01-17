@extends('layouts.app')
@section('title', "| ".$document->title)
@section('content')
    @include('partials._secondaryNav')
    @if(auth::check())
        <div class="col-md-6 col-md-offset-2">
    @else
        <div class="col-md-8 col-md-offset-2">
    @endif
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                {{ $document->title }}
                
                <div class="doc-author">
                    <small> By <strong><i>{{ $document->author }}</i></strong>
                    <br>( {{ $document->year }} ) </small>  
                    
                </div>
                
            </div>
            <div class="panel-body doc-abstract">
                <section  class="well">
                    {!! $document->abstract !!}
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="well">
                    <span class="left-meta-item"><i class="fa fa-eye fa-sm"></i> {{$document->views}}</span> 
                    <a class="btn btn-success btn-sm right-meta-item" href="{{ $path }}" target="_blank">
                        <span class="meta-icon"><i class="fa fa-download fa-sm"></i></span>
                        Download 
                    </a>
                    
                </div>
            </div>
        </div>
    </div>

@if(auth::check())
    <div class="col-md-4">
	<div class ="well">
		<dl class ="dl-horizontal">
			<dt>Created at:</dt>
			<dd>{{ date('M j, Y h:ia',strtotime($document->created_at)) }}</dd>
		</dl>

		<dl class ="dl-horizontal">
			<dt>Last updated:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($document->updated_at))}}</dd>
		</dl>
		{{--  <hr>  --}}
		 <div class ="row">
			<div class = "col-sm-6">
				{!! Html::linkRoute('documents.edit','Edit', array($document->id), array('class' => 'btn btn-primary btn-block btn-space')) !!}
			</div>
			<div class = "col-sm-6 ">
			    {!! Form::open([ 'route'=>['documents.destroy', $document->id], 'method'=>'DELETE' ]) !!}

			    {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-space']) !!}
			</div>

		</div>
		<div class = "row">
			<div class = "col-md-12">
				{!! Html::linkRoute('documents.index','<<< view all documents',[],['class' => 'btn btn-h1 btn-default btn-block']) !!}
			</div>

		</div>  
	</div>
</div>
</div>
@endif


@endsection