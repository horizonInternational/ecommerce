@extends('layouts.backend')

@section('title', 'View Menu')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Menu</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3">&nbsp;
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Title : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{$menu->title}}" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Parent Name: *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="parent_id" value="@php
                                if(is_null($parent)){
                                echo '';
                                }else{
                                echo $parent->title;
                           } @endphp" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Order : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="page" value="{{$menu->order}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('menus')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection