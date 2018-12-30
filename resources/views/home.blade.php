@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h2>App Management</h2>
        <hr class="hr-custom">
        <div class="box" style="min-height:400px;">
            <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel default tile" data-window="users" title="users">
                        <div class="panel-body text-center">
                            <h4 class="tile-icon">
                                <i class="fa fa-user"></i>
                            </h4>
                            <p>
                                Users ({{$users}})
                            </p>
                        </div>
                    </div>
                </div><!-- ./tile-->
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel default tile" data-window="posts" title="posts">
                        <div class="panel-body text-center">
                            <h4 class="tile-icon">
                                <i class="fa fa-comments"></i>
                            </h4>
                            <p>
                                Posts&nbsp;({{$posts}})
                            </p>
                        </div>
                    </div>
                </div><!-- ./tile-->
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel default tile" data-window="feeds" title="feeds">
                        <div class="panel-body text-center">
                            <h4 class="tile-icon">
                                <i class="fa fa-archive"></i>
                            </h4>
                            <p>
                                Feeds&nbsp;({{$feeds}})
                            </p>
                        </div>
                    </div>
                </div><!-- ./tile-->
                <div class="col-sm-3 col-xs-6">
                    <div class="panel panel default tile" data-window="seeds" title="seeds">
                        <div class="panel-body text-center">
                            <h4 class="tile-icon">
                                <i class="fa fa-box"></i>
                            </h4>
                            <p>
                                Seeds&nbsp;({{$seeds}})
                            </p>
                        </div>
                    </div>
                </div><!-- ./tile-->
            </div><!-- ./row-->
            <div class="row">
                <div class="col-sm-12">
                    <h4 style="margin-top:2px;margin-bottom:2px;">Quick Create</h4>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <button type="button" data-toggle="modal" data-target="#create-user-window"
                                            class="btn btn-primary btn-block">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Create User
                                    </button>
                                    <button data-toggle="modal" data-target="#create-feed-window"
                                            class="btn btn-primary btn-block">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Create Feed
                                    </button>
                                    <button data-toggle="modal" data-target="#create-seed-window"
                                            class="btn btn-primary btn-block">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Create Seed
                                    </button>
                                    <button data-toggle="modal" data-target="#create-post-window"
                                            class="btn btn-primary btn-block">
                                        <i class="fa fa-plus-circle"></i>&nbsp;Create Post
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="panel panel-default">
                                <div class="panel-body text-center">
                                    <p style="margin-top:62px;margin-bottom:62px;">
                                        <i class="fa fa-info-circle"></i>&nbsp;You can use the quick create buttons to
                                        quickly create resources
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
    </div><!-- ./container-->

    @include('partials.create-user')
    @include('partials.create-feed')
    @include('partials.create-seed')
    @include('partials.create-post')
@stop


@section('scripts')
    <script>
        const appURL = "{{URL('/')}}";

        $(document).ready(function () {
            $('.tile').on('click', function () {
                var target = $(this).attr('data-window');
                window.location.assign(appURL + '/' + target);
            })


        })
    </script>
    @if(session()->has('target-window') && count($errors)>0)
        <script>
            $(document).ready(function () {
                var targetWin = "{{session('target-window')}}"
                $(targetWin).modal('show');
            })
        </script>
    @endif

@stop


