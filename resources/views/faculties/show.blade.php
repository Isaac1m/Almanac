@extends('layouts.app')
@section('title','| '. $faculty->name)

@section('content')
<div class="container-fluid">
@if(!(Auth::check()))
@include('partials._secondaryNav')
@endif


	<div class = "row">
		<div class = "col-md-7 col-md-offset-1 well" >	
	<h2 class="text-center">{{ $faculty->name }}</h2>
		<section class ="well">
			{!! $faculty->description !!}
		</section>
		</div>
	@if(auth::check())
	<div class="col-md-4">
		<div class ="well">
			<dl class ="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{ date('M j, Y h:ia',strtotime($faculty->created_at)) }}</dd>
			</dl>

			<dl class ="dl-horizontal">
				<dt>Last updated:</dt>
				<dd>{{date('M j, Y h:ia',strtotime($faculty->updated_at))}}</dd>
			</dl>
			{{--  <hr>  --}}
			<div class ="row">
				<div class = "col-sm-6">
					{!! Html::linkRoute('faculties.edit','Edit', array($faculty->id), array('class' => 'btn btn-primary btn-block btn-space')) !!}
				</div>
				<div class = "col-sm-6 ">
					{!! Form::open([ 'route'=>['faculties.destroy', $faculty->id], 'method'=>'DELETE' ]) !!}

					{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-space']) !!}
				</div>

			</div>
			<div class = "row">
				<div class = "col-md-12">
					{!! Html::linkRoute('faculties.index','<<< view all faculties',[],['class' => 'btn btn-h1 btn-default btn-block']) !!}
				</div>

			</div>  
		
	</div>

	</div>
	@else
		@if(isset($facultyDepts))
			<div class="col-md-4">
				<div class ="well">
					<div class="row">
						<p class="text-center well">Departments in the faculty of {{ $faculty->name }}</p>
					</div>
					@foreach($facultyDepts as $facultyDept)
						<dl class ="dl-horizontal">
							<section class="no-decoration">
									<span style="margin-right: 3px;"> 
										<i class="glyphicon glyphicon-hand-right"> </i>
									</span>
									<a href="{{ route('depts.show', $facultyDept->id)}}" class="no-decoration">
										{{$facultyDept->name}}
									</a>

									<span style="margin-left: 20px;"> <span class="badge">{{ count($facultyDept->documents()) }} </span></span>
							</section>
						</dl>				
					@endforeach
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							{{ $facultyDepts->links()}}
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
</div>
@endsection

