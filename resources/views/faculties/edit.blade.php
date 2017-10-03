@extends('layouts.app')
@section('title', '| Edit faculty')
@section('content')
<div class = "row">

	{!! Form::model($faculty, ['route'=> ['faculties.update',$faculty->id], 'method'  => 'PATCH' ]) !!}
	<div class = "col-md-7 col-md-offset-1 jumbotron" >
{{ Form::label('name','Name') }}
	{{ Form::text('name',null,['class'=>'form-control input-lg']) }}


{{Form::label('description','Description')}}
	{{Form::textarea('description',null,['class' => 'form-control', 'id'=>'summernote'])}}
	</div>

<div class="col-md-4">
	<div class ="well">
		<dl class ="dl-horizontal">
			<dt>Created at:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($faculty->created_at))}}</dd>
		</dl>

		<dl class ="dl-horizontal">
			<dt>Last updated:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($faculty->updated_at))}}</dd>
		</dl>
		<hr>
		<div class ="row">
			<div class = "col-sm-6">
				{!! Html::linkRoute('faculties.show','Cancel', array($faculty->id), array('class' => 'btn btn-danger btn-block btn-space')) !!}

			</div>
			<div class = "col-sm-6">
			{{Form::submit('Save',['class' => 'btn btn-success btn-block btn-space'])}}

			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
</div> <!-- end of row -->
<hr>

@endsection
