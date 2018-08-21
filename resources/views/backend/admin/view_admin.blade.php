@extends('layouts.backend')

@section('title', 'Admin')
@section('activeAdmin', 'active')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Admin</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        <img class="himg" src="{{ url('public/img/admin/'.$admin->image) }}" width="160px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Email : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{$admin->email}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Contact : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact" value="{{$admin->contact}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Address : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" value="{{$admin->address}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Profile : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="profile" value="{{$admin->profile}}" disabled>
                        </div>
                    <div class="col-md-12">&nbsp;&nbsp;</div>
                    <div align="center">
                        <a href="{{route('admins')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection