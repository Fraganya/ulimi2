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

</head>
<body>
    <div class="container">
        <div class="col-sm-4"></div><!-- ./dummy-->
        <div class="col-sm-4" style="margin-top:150px;">
            <div class="text-center">
                <img src="{{asset('assets/img/logo.png')}}"  style="width:100px;height:100px;" alt="">
            </div>
            <h2 class="text-center">Ulimi Net </h2>
            @if($errors->has('username'))
                <div class="panel panel-danger panel-error">
                    <div class="panel-body">
                        <i class="fa fa-user-times"></i>&nbsp;
                        Your username or password is incorrect!
                    </div>
                </div>
            @endif
            <div class="panel panel-default box">
                <div class="panel-body">
                   <form action="{{route('login')}}" method="POST" role="form">
                       @csrf
                       <input type="hidden"  name="web_access" value="true">
                       <div class="form-group">
                           <label for="">Username</label>
                           <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="username">
                        </div>
                       <div class="form-group ">
                           <label for="">Password</label>
                           <input type="password" class="form-control" name="password" placeholder="password">
                       </div>
                       <button type="submit" class="btn btn-info">
                            <i class="fa fa-sign-in-alt"></i>&nbsp;Sign In
                       </button>
                   </form>
                </div>
            </div><!-- ./login form-->
            
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    ULIMI-NET 2018 All Rights Reserved
                </div>
            </div>
            
            
        </div>
        <div class="col-sm-4"></div><!-- ./dummy-->
    </div>


<script src="{{URL::asset('assets/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

</body>
</html>