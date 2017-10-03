@extends('layouts.app')
@section('title', '| Add Department')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('css/upload.css') }}">
@endsection
@section('content')
    
 
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Add New Document</div>
                        <div class="panel-body"> 
                                 
                                <form class="form-horizontal" action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Document title">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Abstract</label>
                                        <div class="col-sm-10">
                                        <textarea  class="form-control" id="summernote" name="abstract" id="abstract" placeholder="Provide a sketchy summary of the main points of the document"> </textarea>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="author" id="author" placeholder="Document Author">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="document" class="col-sm-2 control-label">Document</label>
                                        <div class="col-sm-10 ">
                                            <input type="file" title="Select File" class="btn-default" name="doc" id="document">
                                        </div>
                                    
                                    </div>

                                     <div class="form-group">
                                     <label for="faculty_id" class="col-sm-2 control-label">Department</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker" data-live-search="true" title="Select department..." id="department_id" name="department_id">
                                                @foreach($departments as $department)
                                                 <option data-tokens="{{ $department->name }}" value="{{$department->id}}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="upload-btn">Add Document</button>
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
    
<script src="{{ asset('file-input/bootstrap.file-input.js') }}'"> </script>

<script> 
    $('input[type=file]').bootstrapFileInput();
</script>
@endsection

