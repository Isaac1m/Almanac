@extends('layouts.app')
@section('title','| '. $faculty->name)
@section('content')
<div class = "row">
	<div class = "col-md-7 col-md-offset-1 jumbotron" >
<h2 class="text-center">{{ $faculty->name }}</h2>
	<p class ="well">
		{!! $faculty->description !!}
	</p>
	</div>

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

</div>
{{--  <hr>  --}}
@endsection
