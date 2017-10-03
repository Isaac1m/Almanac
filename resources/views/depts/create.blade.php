@extends('layouts.app')
@section('title', '| Add Department')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('content')
    
 
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Add New Department</div>
                        <div class="panel-body"> 
                                 
                                <form class="form-horizontal" action="{{ route('depts.store') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Department Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                        <textarea  class="form-control" id="summernote" name="description" id="description" placeholder="Add a brief description"> </textarea>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                     <label for="faculty_id" class="col-sm-2 control-label">Faculty</label>
                                        <div class="col-sm-10 ">
                                            <select class="selectpicker" data-live-search="true" title="Choose one faculty..." id="faculty_id" name="faculty_id">
                                                @foreach($faculties as $faculty)
                                                 <option data-tokens="{{ $faculty->name }}" value="{{$faculty->id}}">{{ $faculty->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Department</button>
                                        </div>
                                    </div>
                                </form>
                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection  

@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
@endsection

