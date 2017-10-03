<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4" v-for="doc in docs">
                <div class="card" style="width: 15rem;">
                 <div class="card-body">
                    <h4 class="card-title">Document title</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Document author</h6>
                    <p class="card-text">A quick and brief description of the Dissertation
                        A quick and brief description of the Dissertation
                    </p>
                    <p class="doc-views text-muted"><i class="fa fa-eye fa-sm"></i> <span >245</span></p>
                    <a href="#" class="btn btn-primary btn-block btn-sm card-read-more">Read More</a>
                    
                </div>
             </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        
        data(){
            return{
                docs: 10
               
            }
        }

    }
</script>

 <style>


    
    .card-title{
        text-align: center;
    }

    .card{
        margin: 5px;
        box-shadow: 0px 0px 0px grey;
    }
    .card:hover{ 
     box-shadow: 1px 8px 20px grey;
    -webkit-transition:  box-shadow .6s ease-in;
  }

    .card-title{
        font-size: 14px;
    }

    .card-subtitle{
        text-align: center;
        font-size: 12px;
    }
    
    p.doc-views {
        text-align: center;
    }
    p.doc-views span{
        margin-left: 5px;
       
    }

    .card-read-more{
        right:5px;
    }
 </style>

