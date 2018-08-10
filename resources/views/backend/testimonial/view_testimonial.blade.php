@extends('layouts.backend')

@section('title', 'View Testimonial')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Testimonial</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">
                        <img class="himg" src="{{ url('public/img/testimonial/'.$testimonial->image) }}" width="160px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{$testimonial->name}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Post : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="post" value="{{$testimonial->post}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Message : *</strong></div>
                        <div class="col-md-9">
                                <textarea class="form-control" name="message" rows="7" style="resize: none;"
                                          disabled>
                                    {{$testimonial->message}}
                                </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('testimonials')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection