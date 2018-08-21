@extends('layouts.backend')

@section('title', 'Create Route')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create Route</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeRoute')}}" method="post" id="route_form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3"><strong>Title : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                            <small class="text text-danger">{{$errors->first('title')}}</small>

                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-md-3"><strong>From : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="from" placeholder="From" required>
                            <small class="text text-danger">{{$errors->first('from')}}</small>

                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-md-3"><strong>To : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="to" placeholder="To" required>
                            <small class="text text-danger">{{$errors->first('to')}}</small>

                        </div>
                    </div>

                    <div class="rows " >
                        <div class="col-md-3"><strong>City Cover : *</strong></div>
                        <div class="col-md-9">
                            {{--<input type="text" class="form-control" name="city_cover" placeholder="Location 1" required>--}}
                            <textarea name="city_cover" id="" cols="80" rows="5" class="form-control" style="resize: none"></textarea>
                            <small class="text text-danger">{{$errors->first('city_cover')}}</small>
                        </div>
                    </div>
                      <div class="col-md-12">&ensp;</div>
                    <div class="row">&nbsp;
                        <div class="col-md-12">
                            <div align="center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                    Save Changes
                                </button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection