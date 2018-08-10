@extends('layouts.backend')

@section('title', 'View Team')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Team</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        <img class="himg" src="{{ url('public/img/team/'.$team->image) }}" width="160px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Title :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$team->title}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{$team->name}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Post : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="post" value="{{$team->post}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Facebook Link :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="facebook" value="{{$team->facebook}}"
                                   disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Twitter Link :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="twitter" value="{{$team->twitter}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div align="center">
                            <a href="{{route('teams')}}" class="btn btn-success">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection