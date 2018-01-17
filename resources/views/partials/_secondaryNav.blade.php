 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('documents.index') }}">Almanac</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{Request::is('documents') ? "active" : " "}}"><a href="{{ route('documents.index') }}">Home</a></li>
            <li class="{{Request::is('documents/latest') ? "active" : " "}}"><a href="{{ route('documents.latest') }}">Latest</a></li>
            <li class="{{Request::is('documents/popular') ? "active" : " "}}"><a href="{{ route('documents.popular') }}">Most Read</a></li> 
            <li class="{{Request::is('faculties') ? "active" : " "}}"><a href="{{ route('faculties.index') }}">Faculties</a></li>  
          </ul>
          <form class="navbar-form navbar-right" method='POST' action="{{ route('search') }}">
            {{ csrf_field() }}
              <div class="form-group">
                <input type="text" placeholder="Search" class="form-control" name="query" required="" >
              </div>
              <button type="submit" class="btn btn-success">Search</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    