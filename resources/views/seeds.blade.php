@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h4>Seeds</h4>
        <hr class="hr-custom">
        <div class="box">
            @foreach($seeds as $seed)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Seed # {{$seed->id}}
                            <span class="pull-right">
                                 <i class="fa fa-hashtag"></i>&nbsp;{{$seed->language}}&nbsp;
                                <i class="fa fa-tags"></i>&nbsp;{{$seed->category->name}}
                            </span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4>{{$seed->title}}</h4>
                        <p>
                            {{$seed->content}}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{URL('feeds/remove',$seed->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete
                        </a>

                    </div>
                </div>
            @endforeach
            @if(count($seeds)==0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-info-circle"></i>&nbsp;There are no posts for plant seeds yet!
                    </div>
                </div>
            @endif

            <div class="" style="">
                @if($seeds->onFirstPage())
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Prev
                    </button>
                @else
                    <a href="{{$seeds->previousPageUrl()}}" class="btn btn-default rad-0">
                        Prev
                    </a>
                @endif

                @if($seeds->hasMorePages())
                    <a href="{{$seeds->nextPageUrl() }}" class="btn btn-default rad-0">
                        Next
                    </a>
                @else
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Next
                    </button>
                @endif
            </div>
        </div>
    </div>


@stop