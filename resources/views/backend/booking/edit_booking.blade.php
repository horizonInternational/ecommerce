@extends('layouts.backend')

@section('title', 'Edit Bookings')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Booking</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateBooking')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$booking->bookings_id}}">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3"><strong>Traveller Name : *</strong></div>
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-9">
                            <select name="travellers_id" id="" class="form-control">
                                @foreach($travellers as $key)
                                    <option value="{{$key->travellers_id}}"
                                            @if($key->travellers_id==$booking->travellers_id) selected @endif>{{$key->email}}</option>
                                @endforeach
                            </select>
                            <small class="text text-danger">{{$errors->first('travellers_id')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows">
                        <div class="col-md-3"><strong>Guest Name : *</strong></div>
                        <div class="col-md-9">
                            <select name="guests_id" id="" class="form-control">
                                @foreach($guests as $key)
                                    <option value="{{$key->guests_id}}"
                                            @if($key->guests_id==$booking->guests_id) selected @endif>{{$key->name}}</option>
                                @endforeach
                            </select>
                            <small class="text text-danger">{{$errors->first('guests_id')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows">
                        <div class="col-md-3"><strong>Bus : *</strong></div>
                        <div class="col-md-9">
                            <select name="buses_id" id="" class="form-control">
                                @foreach($buses as $key)
                                    <option value="{{$key->buses_id}}"
                                            @if($key->buses_id==$booking->buses_id) selected @endif>{{$key->title}}</option>
                                @endforeach
                            </select>
                            <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                        </div>
                    </div>

                    {{--<div class="rows">--}}
                    {{--<div class="col-md-3"><strong>Route : *</strong></div>--}}
                    {{--<div class="col-md-9">--}}
                    {{--<input type="text" class="form-control" name="route_name" id="route" value="{{$booking->route_name}}">--}}
                    {{--<small class="text text-danger">{{$errors->first('route_name')}}</small>--}}

                    {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="rows " >--}}
                    {{--<div class="col-md-3"><strong>Bus Number : *</strong></div>--}}
                    {{--<div class="col-md-9">--}}
                    {{--<input type="number" class="form-control" name="buses_id" value="{{$booking->buses_id}}">--}}
                    {{--<small class="text text-danger">{{$errors->first('buses_id')}}</small>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="rows ">
                        <div class="col-md-3"><strong>Seat : *</strong></div>
                        <div class="col-md-9">

                            <input type="text" value="{{$booking->seat}}" class="form-control">

                            <small class="text text-danger">{{$errors->first('seat')}}</small>

                        </div>
                    </div>
                    <div class="rows ">
                        <div class="col-md-3"><strong>Price : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="price" value="{{$booking->price}}">
                            <small class="text text-danger">{{$errors->first('price')}}</small>
                        </div>
                    </div>

                    <div class="rows ">
                        <div class="col-md-3"><strong>Status : *</strong></div>
                        <div class="col-md-9">
                            <select name="profile" id="select_profile" class="form-control">
                                <option value="confirmed" @if($booking->profile=="confirmed") selected @endif>
                                    confirmed
                                </option>
                                <option value="cancelled" @if($booking->profile=="cancelled") selected @endif>
                                    cancelled
                                </option>
                                <option value="pending" @if($booking->profile=="pending") selected @endif>pending
                                </option>
                            </select>
                            <small class="text text-danger">{{$errors->first('profile')}}</small>
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