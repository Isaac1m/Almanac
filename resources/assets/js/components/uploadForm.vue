<template>      
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                        <div class="panel-body"> 
                                 
                                <form class="form-horizontal" action="/document" method="POST">
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <label for="author" class="col-sm-2 control-label">Author</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" placeholder="Author">
    </div>
  </div>

<div class="form-group">
    <label for="doc" class="col-sm-2 control-label">Document</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="doc" name="doc" placeholder="Document">
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add Document</button>
    </div>
  </div>
</form>
                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</template>

<script>
    export default {
        
    }
</script>