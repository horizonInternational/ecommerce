@extends('layouts.backend')

@section('title', 'Create Guest')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create Guest</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeGuest')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Name : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                                <small class="text text-danger">{{$errors->first('name')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            {{--<div class="col-md-3"><strong>Email : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="email" placeholder="Email" required>--}}
                                {{--<small class="text text-danger">{{$errors->first('email')}}</small>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;&nbsp;</div>--}}
                            {{--<div class="col-md-3"><strong>Address : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="address" placeholder="Address">--}}
                                {{--<small class="text text-danger">{{$errors->first('address')}}</small>--}}
                            {{--</div>--}}
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact" placeholder="Moblie">
                                <small class="text text-danger">{{$errors->first('address')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            {{--<div class="col-md-3"><strong>Password</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="password" class="form-control" name="password" placeholder="Password">--}}
                                {{--<small class="text text-danger">{{$errors->first('password')}}</small>--}}

                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}
                            {{--<div class="col-md-3"><strong>Confirm Password</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="password" class="form-control" name="password_confirmation"--}}
                                       {{--placeholder="Confirm Password">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;&nbsp;</div>--}}
                            {{--<div class="col-md-3"></div>--}}
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
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection