@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h4>Posts</h4>
        <hr class="hr-custom">
        <div class="box">
            @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Post # {{$post->id}}
                            <span class="pull-right">
                                 <i class="fa fa-hashtag"></i>&nbsp;{{$post->language}}&nbsp;

                            </span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{$post->content}}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{URL('posts/remove',$post->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        <a href="{{URL('posts/show',$post->id)}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-external-link-alt"></i> Open
                        </a>

                    </div>
                </div>
            @endforeach

            @if(count($posts)==0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-info-circle"></i>&nbsp;There are no news posts yet!
                    </div>
                </div>
            @endif

            <div class="" style="">
                @if($posts->onFirstPage())
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Prev
                    </button>
                @else
                    <a href="{{$posts->previousPageUrl()}}" class="btn btn-default rad-0">
                        Prev
                    </a>
                @endif

                @if($posts->hasMorePages())
                    <a href="{{$posts->nextPageUrl() }}" class="btn btn-default rad-0" >
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