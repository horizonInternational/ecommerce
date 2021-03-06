@extends('layouts.backend')

@section('title', 'Create Bus')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create Bus</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeBus')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                            <img src="{{ url('public/img/bus/avatar.jpg') }}"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="width: 150px; height:100px;"></div>
                                        <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" required/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Name : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" placeholder="Name" required>
                                <small class="text text-danger">{{$errors->first('title')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Bus Number : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="vehicle_no" placeholder="Bus No" required>
                                <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;&nbsp;</div>
                            <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" placeholder="Bill Book No">
                                <small class="text text-danger">{{$errors->first('billbook_no')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Bus Type</strong></div>
                            <div class="col-md-9">
                                <select name="bustypes_id" id="" class="form-control">
                                    @foreach($bustypes as $key)
                                    <option value="{{$key->bustypes_id}}">{{$key->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Route </strong></div>
                            <div class="col-md-9">
                                <select name="routes_id" id="" class="form-control">
                                    @foreach($routes as $key)
                                    <option value="{{$key->routes_id}}">{{$key->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Vendor</strong></div>
                            <div class="col-md-9">
                                <select name="vendors_id" id="" class="form-control">
                                    @foreach($vendors as $key)
                                    <option value="{{$key->vendors_id}}">{{$key->email}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Driver1 : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="driver1" placeholder="Driver1">
                                <small class="text text-danger">{{$errors->first('driver1')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact No : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact1" placeholder="Driver1 Contact">
                                <small class="text text-danger">{{$errors->first('contact1')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Driver2 : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="driver2" placeholder="Driver2">
                                <small class="text text-danger">{{$errors->first('driver2')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact No : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact2" placeholder="Driver2 Contact">
                                <small class="text text-danger">{{$errors->first('contact2')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Staff1 : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="staff1" placeholder="Staff1">
                                <small class="text text-danger">{{$errors->first('staff1')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact No : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact3" placeholder="Staff1 Contact">
                                <small class="text text-danger">{{$errors->first('contact3')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Staff2 : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="staff2" placeholder="Staff2">
                                <small class="text text-danger">{{$errors->first('staff2')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact No : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact4" placeholder="Staff2 Contact">
                                <small class="text text-danger">{{$errors->first('contact4')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3">&ensp;</div>
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