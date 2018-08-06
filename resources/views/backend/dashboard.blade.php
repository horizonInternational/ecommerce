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
                <a href="banner">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/banner-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="blog">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/blog-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="country">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/countries-icon.png') }}" height="100px" width="163px">
                    </button>

                    <a href="panel">
                        <button class="btn btn-default"></button>
                    </a>
                &nbsp;&nbsp;
                <a href="feedback">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/feedback-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>

                <div>&nbsp;</div>

                <a href="gallery">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/gallery-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="team">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/team-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="testimonial">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/testimonial-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
                &nbsp;&nbsp;
                <a href="whyus">
                    <button class="btn btn-default">
                        <img src="{{ url('public/img/icon/whyus-icon.png') }}" height="100px" width="163px">
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
