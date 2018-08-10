@extends('layouts.backend')

@section('title', 'User')
@section('activeUser', 'active')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Users</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        <img class="himg" src="{{ url('public/img/user/'.$user->image) }}" width="160px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Email : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{$user->email}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Username : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="username" value="{{$user->username}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>User Type : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="username" value="{{$user->user_type}}" disabled>
                        </div>
                    <div class="col-md-12">&nbsp;&nbsp;</div>
                    <div align="center">
                        <a href="{{route('users')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection