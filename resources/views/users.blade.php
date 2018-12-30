@extends('sys')


@section('content')
    @include('partials.navbar')

    <div class="container">
        <h4>Users</h4>
        <hr class="hr-custom">
        <div class="box">
            @if(count($users)==0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-info-circle"></i>&nbsp;There are no users yet (Your Account is not included)!
                    </div>
                </div>
            @else
            <table class="table table-striped">
                <caption>All Users</caption>
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Firstname</td>
                        <td>Surname</td>
                        <td>Number</td>
                        <td>Specialization</td>
                        <td>Type</td>
                        <td>Pref Lang</td>
                        <td>
                            <i class="fa fa-wrench"></i>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->number}}</td>
                            <td>{{$user->specialization}}</td>
                            <td>{{$user->type}}</td>
                            <td>{{$user->pref_lang}}</td>
                            <td>
                                <a href="{{URL('users/reset-password',$user->id)}}" class="btn btn-success btn-sm" title="Reset Password">
                                    <i class="fa fa-unlock"></i>&nbsp;Reset
                                </a>
                                <a href="{{URL('users/remove-account',$user->id)}}" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <div class="" style="">
                @if($users->onFirstPage())
                    <button type="button" class="btn btn-default rad-0" disabled>
                        Prev
                    </button>
                @else
                    <a href="{{$users->previousPageUrl()}}" class="btn btn-default rad-0">
                        Prev
                    </a>
                @endif

                @if($users->hasMorePages())
                    <a href="{{$users->nextPageUrl() }}" class="btn btn-default rad-0" >
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