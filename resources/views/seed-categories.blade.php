@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h4>Seed Categories</h4>
        <hr class="hr-custom">
        <div class="box">
            @if(count($categories)==0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-info-circle"></i>&nbsp;There are no plant seed categories yet!
                    </div>
                </div>
            @else
            <table class="table table-striped">
                <caption>All Seed Categories (Paginated)</caption>
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Lang</td>
                    <td>
                        <i class="fa fa-wrench"></i>
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->description}}</td>
                        <td>{{$cat->language}}</td>
                        <td>
                            <a href="{{URL('seed-cats/remove',$cat->id)}}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            <div class="" style="">
                @if($categories->onFirstPage())
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Prev
                    </button>
                @else
                    <a href="{{$categories->previousPageUrl()}}" class="btn btn-default rad-0">
                        Prev
                    </a>
                @endif

                @if($categories->hasMorePages())
                    <a href="{{$categories->nextPageUrl() }}" class="btn btn-default rad-0" >
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