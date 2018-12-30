@extends('sys')



@section('content')
    @include('partials.navbar')

    <div class="container">
        <h2>System Status</h2>
        <hr class="hr-custom">

        <div class="box">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{$status}}
                </div>
                <div class="panel-footer">
                    <a href="{{URL('home')}}" class="btn btn-primary">
                        <i class="fa fa-home"></i>&nbsp;Home
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop