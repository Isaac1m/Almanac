@extends('layouts.app')
@section('title','| '.$department->name)
@section('content')
	<div class="container-fluid">
			@if(!(Auth::check()))
			@include('partials._secondaryNav')
			@endif

			<div class = "row">
				<div class = "col-md-7 col-md-offset-1 well" >
					<h2 class="text-center">{{ $department->name }}</h2>
					<section class="well">
						{{ $department->description }}
					</section>
				</div>
		@if(Auth::check())
		<div class="col-md-4">
			<div class ="well">
				<dl class ="dl-horizontal">
					<dt>Created at:</dt>
					<dd>{{ date('M j, Y h:ia',strtotime($department->created_at)) }}</dd>
				</dl>

				<dl class ="dl-horizontal">
					<dt>Last updated:</dt>
					<dd>{{date('M j, Y h:ia',strtotime($department->updated_at))}}</dd>
				</dl>
				{{--  <hr>  --}}
				<div class ="row">
					<div class = "col-sm-6">
						{!! Html::linkRoute('depts.edit','Edit', array($department->id), array('class' => 'btn btn-primary btn-block btn-space')) !!}
					</div>
					<div class = "col-sm-6 ">
						{!! Form::open([ 'route'=>['depts.destroy', $department->id], 'method'=>'DELETE' ]) !!}

						{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-space']) !!}
					</div>

				</div>
				<div class = "row">
					<div class = "col-md-12">
						{!! Html::linkRoute('home','<<< view all departments',[],['class' => 'btn btn-h1 btn-default btn-block']) !!}
					</div>

				</div>  
			</div>
		</div>


		@else
			@if(isset($documents))
				<div class="col-md-4">
					<div class ="well">
							<div class="row">
								<p class="text-center well section-header">Dissertations in the department of {{ $department->name }}</p>
							</div>
						@foreach($documents as $document)
							<dl class ="dl-horizontal">
								
								<section class="no-decoration">
									<span style="margin-right: 3px;"> 
										<i class="glyphicon glyphicon-hand-right"> </i>
									</span>
									<a href="{{ route('documents.show', $document->id)}}">
										{!! substr($document->title, 0,60) !!} {{ strlen($document->title) > 60 ? "..." : ""}}
									</a>
								</section>
									{{--  <dd> {{ $document->views}} Views </dd>  --}}
									
								
							</dl>	
						@endforeach
						<div class="row">
							<div class="text-center">
								{{ $documents->links()}}
							</div>
						</div>
					</div>
				</div>
			@else
				<div class="col-md-4">
					<div class ="well">
						<h1 class="not-found-msg text-center">;)</h1> <p class="text-center"> {{ $message }}</p>
					</div>
				</div>
			@endif
		@endif
		</div>
	</div> {{-- container-fluid --}}
@endsection
