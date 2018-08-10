@extends('layouts.backend')

@section('title', 'View Feedback')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Feedback</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-6">
                        <div class="col-md-3"><strong>First Name :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$feedback->fname}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3"><strong>Last Name :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$feedback->lname}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="col-md-3"><strong>Email :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$feedback->email}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3"><strong>Phone :</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$feedback->phone}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">
                        <div class="col-md-2"><strong>Message :</strong></div>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="7" style="resize: none;" disabled>{{ $feedback->message  }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('feedbacks')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection