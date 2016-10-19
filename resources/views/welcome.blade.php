<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta id="X-CSRF-TOKEN" content="{{ csrf_token() }}">
        <title>Laravel</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css" />
        
    </head>
    <body>
        <div class="container" id="searchPage">
            
            <h1>Real Time Search</h1>
            
            <form class="form-horizontal" v-on:submit.prevent>
                <div class="form-group">
                    <label class="control-label">Search:</label>
                        <input type="text" class="form-control" v-model="query" v-on:keyup="search">
                </div>
            </form>
            
            <h4 v-show="users.length == 0">No matches</h4>
            
            <ul class="list-group">
                <li class="list-group-item" v-for="user in users" v-html="user.name"></li>
            </ul>
            
            <!--<pre>@{{ $data | json }}</pre>-->
            
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
        
        <script src="assets/app.js"></script>
        
    </body>
</html>
