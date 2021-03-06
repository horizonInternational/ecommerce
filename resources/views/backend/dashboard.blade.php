@extends('layouts.backend')

@section('title', 'Dashboard')
@section('activeDashboard', 'active')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Dashboard</h3>
            </div>
            <div class="panel-body">
                <a href="{{route('banners')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/banner-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="{{route('blogs')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/blog-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                {{--<a href="{{}}">--}}
                    {{--<button class="btn btn-default">--}}
                        {{--<img src="{{ url('public/img/icon/countries-icon.png') }}" height="100px" width="163px">--}}
                    {{--</button></a>--}}
                &nbsp;&nbsp;
                <a href="{{route('feedbacks')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/feedback-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>

                <a href="{{route('galleries')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/gallery-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="{{route('teams')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/team-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="{{route('testimonials')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/testimonial-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="{{route('whyus')}}">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/whyus-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
