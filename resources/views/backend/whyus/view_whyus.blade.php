@extends('layouts.backend')

@section('title', 'View Why Choose Us')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Why Choose Us</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        <img class="himg" src="{{ url('public/img/whyus/'.$whyus->image) }}" width="160px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Title : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{$whyus->title}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Description : *</strong></div>
                        <div class="col-md-9">
                                <textarea class="form-control" name="description" rows="7" style="resize: none;"
                                          disabled>
                                    {{$whyus->description}}
                                </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('whyus')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection