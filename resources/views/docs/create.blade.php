@extends('layouts.app')
@section('title', '| Add Document')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}">
@endsection
@section('content')
    
 
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Add New Document</div>
                        <div class="panel-body"> 
                                 
                                <form class="form-horizontal" id="create-doc" data-parsley-validate="" action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Document title" required=""

                                        	                data-parsley-required-message = 'Please add a title'

                                                            data-parsley-trigger          = 'change focusout'

                                                            data-parsley-minlength        = '2'

                                                            data-parsley-maxlength        = '150'>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Abstract</label>
                                        <div class="col-sm-10">
                                        <textarea  class="form-control" id="summernote" name="abstract" id="abstract" required="" placeholder="Provide a sketchy summary of the main points of the document"

                                                            data-parsley-required-message = 'Please add a brief description of the document'
                                                            data-parsley-trigger          = 'change focusout'
                                                            data-parsley-minlength        = '100'
                                                            data-parsley-minlength-message ="Come on! You need to enter at least a 100 character abstract..">
                                         </textarea>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="author" id="author" required="" placeholder="Document Author"  data-parsley-required-message = 'Who authored this document?'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="document" class="col-sm-2 control-label">Document</label>
                                        <div class="col-sm-10 ">
                                            <input type="file" title="Select File"  required="" class="btn-default" name="doc" id="document"  data-parsley-required-message = 'Please attach a pdf copy of the document'>
                                        </div>
                                    
                                    </div>

                                    <div class="form-group">
                                     <label for="faculty_id" class="col-sm-2 control-label">Department</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker" data-live-search="true" title="Select department..." id="department_id" name="department_id" required="" data-parsley-required-message='Which department was the document submitted to?'>
                                                @foreach($departments as $department)
                                                 <option data-tokens="{{ $department->name }}" value="{{$department->id}}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                     <label for="date" class="col-sm-2 control-label">Year</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker" data-live-search="true" title="Select Year..." id="year" name="year" required="" data-parsley-required-message='When was this document authored?'>
                                                 @foreach($years as $year)
                                                 <option data-tokens="{{ $year }}" value="{{$year}}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="upload-btn"><span class="
                                            glyphicon glyphicon-upload"> </span>Add Document</button>
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

