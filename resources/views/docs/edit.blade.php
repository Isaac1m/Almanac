@extends('layouts.app')
@section('title', '| Edit '.$document->title)
@section('styles')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}">
@endsection
@section('content')
<div class = "row">

	{!! Form::model($document, ['route'=> ['documents.update',$document->id], 'method'  => 'PATCH', 'data-parsley-validate'=>""]) !!}
        {{ csrf_field()}}
	<div class = "col-md-7 col-md-offset-1 jumbotron" >
{{ Form::label('title','Title') }}
	{{ Form::text('title',null,['class'=>'form-control input-lg',
					'required'=>"",

					'data-parsley-required-message' => 'Please add a title',

					'data-parsley-trigger'          => 'change focusout',

					'data-parsley-minlength'        => '2',

					'data-parsley-maxlength'        => '150'
	]) }}

{{ Form::label('author','Author') }}
	{{ Form::text('author',null,['class'=>'form-control input-lg',
		'required'=>"",
		'data-parsley-required-message' => 'Who authored this document?'

	]) }}


{{Form::label('abstract','Abstract')}}
	{{Form::textarea('abstract',null,['class' => 'form-control', 'id'=>'summernote',
		'required'=>"",
		'data-parsley-required-message' => 'Please add a brief description of the document',
		'data-parsley-trigger'          => 'change focusout',
		'data-parsley-minlength'        => '100',
		'data-parsley-minlength-message' =>"Come on! You need to enter at least a 100 character abstract.."
	
	])}}
<br>
	<div class="form-group">
				<label for="document" class="col-sm-2 control-label">Current Doc</label>
				<span>{{ $currentPath }} </span>
				
	</div>
<br>
	<div class="form-group">
			<label for="document" class="col-sm-2 control-label">Change Doc</label>
			<div class="col-sm-10 ">
				<input type="file" title="Select File" class="btn-default" name="doc"  id="document">
			</div>
	</div>

<br>
	<div class="form-group">
		<label for="faculty_id" class="col-sm-2 control-label">Department</label>
			<div class="col-sm-10">
				<select class="selectpicker" data-live-search="true" title="Select department..." id="department_id" name="department_id">
					@foreach($departments as $department)
						@if($department->id == $current)
							<option data-tokens="{{ $department->name }}" value="{{$department->id}}" selected>{{ $department->name }}</option>
						@else
							<option data-tokens="{{ $department->name }}" value="{{$department->id}}">{{ $department->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
	</div>
<br>
 <div class="form-group">
	<label for="date" class="col-sm-2 control-label">Year</label>
	<div class="col-sm-10">
		<select class="selectpicker" data-live-search="true" title="Select Year..." id="year" name="year" required="" data-parsley-required-message='When was this document authored?'>
				@foreach($years as $year)
				@if($year == $currentYear)
					<option data-tokens="{{ $currentYear }}" value="{{ $currentYear }}" selected>{{ $currentYear }}</option>
				@else
				<option data-tokens="{{ $year }}" value="{{$year}}">{{ $year }}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

	</div>

<div class="col-md-4">
	<div class ="well">
		<dl class ="dl-horizontal">
			<dt>Created at:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($document->created_at))}}</dd>
		</dl>

		<dl class ="dl-horizontal">
			<dt>Last updated:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($document->updated_at))}}</dd>
		</dl>
		<hr>
		<div class ="row">
			<div class = "col-sm-6">
				{!! Html::linkRoute('documents.show','Cancel', array($document->id), array('class' => 'btn btn-danger btn-block btn-space')) !!}

			</div>
			<div class = "col-sm-6">
			{{Form::submit('Save',['class' => 'btn btn-success btn-block btn-space'])}}

			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
</div> <!-- end of row -->


@endsection


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script src="{{ asset('file-input/bootstrap.file-input.js') }}'"> </script>

<script> 
    $('input[type=file]').bootstrapFileInput();
</script>
<script>
    window.ParsleyConfig = {

        errorsWrapper: '<div></div>',

        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',

        errorClass: 'has-error',

        successClass: 'has-success'

    };
</script>
@endsection