@extends('layouts.backend')

@section('title', 'View Banner')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Banner</h3>
            </div>
            <div class="panel-body" align="center">
                <div class="rows">
                    <div class="col-md-12">
                        <img class="himg" src="{{ url('public/img/banner/'.$banner->image) }}" width="700px" height="280px"/>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">{{ $banner->image }}</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('banners')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection