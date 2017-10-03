@extends('layouts.app')
@section('title', '| Edit department')
@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('content')
<div class = "row">

		{!! Form::model($department, ['route'=> ['depts.update',$department->id], 'method'  => 'PATCH' ]) !!}
			<div class = "col-md-7 col-md-offset-1 jumbotron" >
		{{ Form::label('name','Name') }}
			{{ Form::text('name',null,['class'=>'form-control input-lg']) }}


		{{Form::label('description','Description')}}
		{{Form::textarea('description',null,['class' => 'form-control', 'id'=>'summernote'])}}
	
		<div class="form-group">
			<label for="faculty_id" class="col-sm-2 control-label">Faculty</label>
			<div class="col-sm-10 ">
				<select class="selectpicker" data-live-search="true" id="faculty_id" name="faculty_id">
					@foreach($faculties as $faculty)
						@if($faculty->id == $current)
							<option data-tokens="{{ $faculty->name }}" value="{{$faculty->id}}" selected>{{ $faculty->name }}</option>
						@else
							<option data-tokens="{{ $faculty->name }}" value="{{$faculty->id}}">{{ $faculty->name }}</option>
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
			<dd>{{date('M j, Y h:ia',strtotime($department->created_at))}}</dd>
		</dl>

		<dl class ="dl-horizontal">
			<dt>Last updated:</dt>
			<dd>{{date('M j, Y h:ia',strtotime($department->updated_at))}}</dd>
		</dl>
		<hr>
		<div class ="row">
			<div class = "col-sm-6">
				{!! Html::linkRoute('depts.show','Cancel', array($department->id), array('class' => 'btn btn-danger btn-block btn-space')) !!}

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

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
@endsection

