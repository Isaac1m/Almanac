@extends('layouts.app')
@section('title','| '.$department->name)
@section('content')
<div class = "row">
	<div class = "col-md-7 col-md-offset-1 jumbotron" >
<h2 class="text-center">{{ $department->name }}</h2>
	<p class ="well">
		{{ $department->description }}
	</p>
	</div>

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

</div>
{{--  <hr>  --}}
@endsection
