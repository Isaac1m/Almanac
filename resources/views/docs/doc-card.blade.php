 <div class="col-md-3 col-md-offset-1">
            <section>
                <div class="card">
                    <div class="top-section">
                            <div class="title">
                                <section> 
                                    <a class="title" href="#">
                                    {!! substr($document->title, 0,150) !!} {{ strlen($document->title) > 150 ? "..." : ""}} 
                                    </a>
                                </section>
                            </div>
                            
                    </div>
                    
                        <div class="bottom-section">
                            <h5 class="author"><small> by </small>  {{ $document->author }}</h5>
                            <section class="abstract"> 
                                {!! substr($document->abstract, 0,350) !!} {{ strlen($document->abstract) > 350 ? "..." : ""}} 
                            </section>
                            <div class = "social-media">
                                <a href="#" class="fa fa-eye fa-bg"></a>
                                <span> 245 </span>
                                
                            </div>
                        </div>
                </div>
            </section> 

        </div>
        @endforeach