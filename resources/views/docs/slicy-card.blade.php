@foreach($documents as $document)
       
        <div class="col-md-6 col-md-offset-2">
            <div class="well slicy-well">
                <li class="list-group-item slicy-cards">
                <p class="title">
                    <a class="no-decoration" href="{{ route('documents.show', $document->id) }}"> 
                     {!! substr($document->title, 0,50) !!} {{ strlen($document->title) > 50 ? "..." : ""}} 
                    </a>
                </p>
                <p class="text-center">
                     <small> <strong>{{ $document ->author }}</strong> </small>
                </p>
                <section class="panel-body"> 
                    {!! substr($document->abstract, 0,100) !!} {{ strlen($document->abstract) > 100 ? "..." : ""}}
                </section>
                </li>
            </div>
        </div>
        @endforeach
