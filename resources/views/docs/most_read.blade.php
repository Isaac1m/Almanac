@extends('layouts.app')
@section('title', "| Popular")


@section('styles')
<link rel="stylesheet" href="{{ asset('css/doc-card.css') }}">
@endsection

@section('content')
   @include('partials._secondaryNav')

        
    <div class="container">
        @foreach($documents as $document)
            <div class="col-md-4">
               
                    <div class="card">
                        <div class="top-section">
                            
                                <section class="title"> 
                                    <a class="title" href="{{ route('documents.show', $document->id) }}">
                                    {!! substr($document->title, 0,150) !!} {{ strlen($document->title) > 150 ? "..." : ""}} 
                                    </a>
                                </section>
                            
                        </div>
                    
                        <div class="bottom-section">
                            <h5 class="author"><small> by </small>  {{ $document->author }}</h5>
                            <section class="abstract"> 
                                {!! substr($document->abstract, 0,300) !!} {{ strlen($document->abstract) > 300 ? "..." : ""}} 
                            </section>
                            <div class="meta-data">
                            <p> 
                            <i class="fa fa-eye fa-sm"></i>
                                <span class="views"> {{ $document->views }} </span>
                            </p>
                            <p class="read-more-btn">
                                <a href="{{ route('documents.show', $document->id) }}" class="btn btn-sm btn-primary"> Read More </a>
                            </p>
        
                            </div>
                        </div>
                
            </div>

        </div>
    @endforeach
    </div>
 
        <div class="col-md-12 text-center">
           {{ $documents->links() }}
        </div>
 


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script src="{{ asset('file-input/bootstrap.file-input.js') }}'"> </script>

<script> 
    $('input[type=file]').bootstrapFileInput();
</script>
@endsection