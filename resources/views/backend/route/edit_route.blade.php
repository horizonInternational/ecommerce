@extends('layouts.backend')

@section('title', 'Edit Routes')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Route</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateRoute')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$route->routes_id}}">

                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3"><strong>Title : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{$route->title}}" placeholder="Title" >
                            <small class="text text-danger">{{$errors->first('title')}}</small>

                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-md-3"><strong>From : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="from" value="{{$route->from}}" placeholder="From" >
                            <small class="text text-danger">{{$errors->first('from')}}</small>

                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-md-3"><strong>To : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$route->to}}" name="to" placeholder="To" >
                            <small class="text text-danger">{{$errors->first('to')}}</small>

                        </div>
                    </div>

                        <div class="rows " >
                            <div class="col-md-3"><strong>City Cover : *</strong></div>
                            <div class="col-md-9">
                                {{--<input type="text" class="form-control" name="city_cover"  value="{{$route->city_cover}}" placeholder="Location 1" >--}}
                                <textarea name="city_cover" class="form-control" id="" cols="80" rows="5"
                                          style="resize: none;">{{$route->city_cover}}</textarea>
                                <small class="text text-danger">{{$errors->first('city_cover')}}</small>

                            </div>
                        </div>
                        <div class="col-md-12">&emsp;</div>

                    <div class="row">&nbsp;
                        <div class="col-md-3">&emsp;</div>
                        <div class="col-md-9">
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