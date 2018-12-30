@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h4>Feeds</h4>
        <hr class="hr-custom">
        <div class="box">
            @foreach($feeds as $feed)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Feed # {{$feed->id}}
                            <span class="pull-right">
                                 <i class="fa fa-hashtag"></i>&nbsp;{{$feed->language}}&nbsp;
                                <i class="fa fa-tags"></i>&nbsp;{{$feed->category->name}}
                            </span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4>{{$feed->title}}</h4>
                        <p>
                            {{$feed->content}}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{URL('feeds/remove',$feed->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete
                        </a>

                    </div>
                </div>
            @endforeach
            @if(count($feeds)==0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-info-circle"></i>&nbsp;There are no posts for animal feeds yet!
                    </div>
                </div>
            @endif

            <div class="" style="">
                @if($feeds->onFirstPage())
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Prev
                    </button>
                @else
                    <a href="{{$feeds->previousPageUrl()}}" class="btn btn-default rad-0">
                        Prev
                    </a>
                @endif

                @if($feeds->hasMorePages())
                    <a href="{{$feeds->nextPageUrl() }}" class="btn btn-default rad-0">
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