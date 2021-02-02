<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-12 col-lg-12">
            <div class="login d-flex py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome Home Page!</h3>
                            <div class="card">
                                <div class="card-body">
                                    Welcome {{ ucfirst(Auth()->user()->name) }}
                                </div>
                                <div class="card-body">
                                    <a class="small" href="{{ route('logout') }}">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
