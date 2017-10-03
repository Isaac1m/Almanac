@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert" style = 'text-align:center;'>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
	<strong>{{Session::get('success')}}</strong>
	</div>
@endif

@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible" role="alert" style = 'text-align:center;'>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
	<strong>{{$error}}</strong>
	</div>
@endforeach