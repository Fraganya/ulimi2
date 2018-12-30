@extends('sys')



@section('content')
    @include('partials.navbar')

    <div class="container">
        <h2>Market Place</h2>
        <hr class="hr-custom">

        <div class="box">
            <div class="panel panel-default">
                <div class="panel-body">
                  <i class="fa fa-info-circle"></i>&nbsp;Feature coming soon
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