@extends('sys')



@section('content')
    @include('partials.navbar')

    <div class="container">
        <h2>System Mobile APIs Test</h2>
        <hr class="hr-custom">

        <div class="box">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button data-toggle="modal" data-target="#create-api-user" class="btn btn-primary btn-block rad-0">User Registration
                            </button>
                            <button data-toggle="modal"  data-target="#authenticate-api-user" class="btn btn-primary btn-block rad-0">User
                                Authentication
                            </button>
                            <button id="post-retrieval" class="btn btn-primary btn-block rad-0">Post Retrieval</button>
                            <button id="feed-retrieval" class="btn btn-primary btn-block rad-0">Feed Retrieval</button>
                            <button id="seed-retrieval" class="btn btn-primary btn-block rad-0">Seed Retrieval</button>
                            <button id="comment-post" class="btn btn-primary btn-block rad-0">Comment Post</button>
                        </div>

                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="panel panel-default" style="min-height:250px">
                        <div class="panel-body" >
                            <p id="response" style="text-wrap: wrap;">
                                <i class="fa fa-info-circle"></i>&nbsp;System Status will be shown here
                            </p>

                        </div>
                    </div>
                </div>

                <form action="">

                </form>
            </div>

        </div>
    </div>


    <!-- Test modal -->
    @include("partials.api-windows")

@stop



@section("scripts")
    <script>
        const RURL = "{{url('api/register')}}";
        const AURL = "{{url('api/authenticate')}}";
        console.log(RURL);
        $(document).ready(function () {
            $("#user-registration").on('click', function () {

                var data={
                    username:$("#username").val(),
                    password:$("#password").val(),
                    email:$("#email").val(),
                    firstname:$("#firstname").val(),
                    surname:$("#surname").val(),
                    specialization:$("#specialization").val(),
                    number:$("#number").val(),
                }

                $.ajax({
                    url: RURL,
                    method: 'POST',
                    data:data,
                    success: function (data,status) {
                        $("#response").html(data)

                    },
                    error: function (err) {
                        $("#response").html(err.toString())
                    }
                })

                $("#create-api-user").modal("hide")
            });

            $("#user-authentication").on('click', function () {

                var data={
                    username:$("#username-a").val(),
                    password:$("#password-a").val(),
                }

                $.ajax({
                    url: AURL,
                    method: 'POST',
                    data:data,
                    success: function (data,status) {
                        $("#response").html(data)

                    },
                    error: function (err) {
                        $("#response").html(err.toString())
                    }
                })

                $("#authenticate-api-user").modal("hide")
            });
        });
    </script>

@stop