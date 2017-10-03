@extends('layouts.app')
@section('title', '| Add Faculty')

@section('content')
    
 
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Add New Faculty</div>
                        <div class="panel-body"> 
                                 
                                <form class="form-horizontal" action="{{ route('faculties.store') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Faculty Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                        <textarea  class="form-control" id="summernote" name="description" id="description" placeholder="Add a brief description"> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary text-center btn-center">Add Faculty</button>
                                        </div>
                                    </div>
                                </form>
                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>.
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/upload.js') }}"> </script>
   
@endsection  

