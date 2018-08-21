@extends('layouts.backend')

@section('title', 'Guest')
@section('activeGuest', 'active')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Guests</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        {{--<img class="himg" src="{{ url('public/img/guest/'.$guest->image) }}" width="160px"/>--}}
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{$guest->name}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Contact : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact" value="{{$guest->contact}}" disabled>
                        </div>
                       <div class="col-md-12">&nbsp;&nbsp;</div>
                    <div align="center">
                        <a href="{{route('guests')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection