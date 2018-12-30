<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ulimi Net</title>
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/font-awesome/css/fontawesome-all.css')}} ">
    <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}} ">

    @yield('stylesheets')
</head>
<body>


    @yield('content')

    <div class="container">
        <hr class="hr-custom">
        &copy;Ulimi-Net 20{{date('y')}} All Rights Reserved
    </div>


    @include('partials.create-feed-category')
    @include('partials.create-seed-category')
    @include('partials.change-password')

    <script src="{{URL::asset('assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    @yield('scripts')
</body>
</html>