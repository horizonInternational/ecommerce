@extends('layouts.backend')

@section('title', 'Create Booking')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create Booking</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeBooking')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3"><strong>Traveller Name : *</strong></div>
                        <div class="col-md-9">
                            <select name="travellers_id" id="" class="form-control">
                                @foreach($travellers as $key)
                                    <option value="{{$key->travellers_id}}">{{$key->email}}</option>
                                @endforeach
                            </select>
                            <small class="text text-danger">{{$errors->first('travellers_id')}}</small>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="col-md-3"><strong>Guest Name : *</strong></div>
                        <div class="col-md-9">
                            <select name="guests_id" id="" class="form-control">
                                @foreach($guests as $key)
                                    <option value="{{$key->guests_id}}">{{$key->contact}}</option>
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
                                    <option value="{{$key->buses_id}}">{{$key->title}}</option>
                                @endforeach
                            </select>
                            <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows " >
                        <div class="col-md-3"><strong>Seat : *</strong></div>
                        <div class="col-md-9">

                                <input type="text" name="seat" class="form-control" placeholder="Select Your Seat" required >

                            <small class="text text-danger">{{$errors->first('seat')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows " >
                        <div class="col-md-3"><strong>Price : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="price" placeholder="Total Price " required>
                            <small class="text text-danger">{{$errors->first('price')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows " >
                        <div class="col-md-3"><strong>Profile : *</strong></div>
                        <div class="col-md-9">
                            <select name="profile" id="profile" class="form-control">
                                <option value="confirmed">confirmed  </option>
                                <option value="cancelled">cancelled </option>
                                <option value="pending">pending </option>
                            </select>
                            <small class="text text-danger">{{$errors->first('profile')}}</small>

                        </div>
                    </div>
                      <div class="col-md-12">&nbsp;</div>

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