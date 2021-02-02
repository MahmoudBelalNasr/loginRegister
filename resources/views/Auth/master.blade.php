<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ asset('customAuth/vendor/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('customAuth/vendor/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body class="bg-gradient-primary">

@yield('content')

<script src="{{ asset('customAuth/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('customAuth/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('customAuth/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('customAuth/vendor/sb-admin-2.min.js') }}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
@yield('scripts')
</body>

</html>
