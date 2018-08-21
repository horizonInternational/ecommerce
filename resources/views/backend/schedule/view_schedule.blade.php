@extends('layouts.backend')

@section('title', 'View Schedule')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View Schedule</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                    <div class="col-md-3"><strong>Bus Name : *</strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{$schedule->buses->title}}" disabled>
                        <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;</div>

                <div class="rows ">
                    <div class="col-md-3"><strong>Departure Date: *</strong></div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" value="{{$schedule->departure_date}}" disabled>
                                <small class="text text-danger">{{$errors->first('departure_date')}}</small>
                            </div>
                            <div class="col-md-6">
                                <input type="time" class="form-control" value="{{$schedule->departure_time}}" disabled>
                                <small class="text text-danger">{{$errors->first('departure_time')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="rows ">
                    <div class="col-md-3"><strong>Arrival Date : *</strong></div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="arrival_date" class="form-control"
                                       value="{{$schedule->arrival_date}}" disabled>
                                <small class="text text-danger">{{$errors->first('arrival_date')}}</small>

                            </div>
                            <div class="col-md-6">
                                <input type="time" name="arrival_time" class="form-control"
                                       value="{{$schedule->arrival_time}}" disabled>
                                <small class="text text-danger">{{$errors->first('arrival_time')}}</small>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">&nbsp;</div>

                <div class="rows ">
                    <div class="col-md-3"><strong>Shift : *</strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{$schedule->shift}}" disabled>
                        <small class="text text-danger">{{$errors->first('shift')}}</small>
                    </div>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="rows ">
                    <div class="col-md-3"><strong>Ticket Price : *</strong></div>
                    <div class="col-md-9">
                        <input type="text" name="ticket_price" class="form-control" value="{{$schedule->ticket_price}}" disabled>
                        <small class="text text-danger">{{$errors->first('shift')}}</small>
                    </div>
                </div>

                <div class="col-md-12">&nbsp;</div>

                <div class="row">&nbsp;
                    <div class="col-md-3">&ensp;</div>
                    <div class="col-md-9">
                        <div align="center">
                            <div align="center">
                                <a href="{{route('schedules')}}" class="btn btn-success">
                                    <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection