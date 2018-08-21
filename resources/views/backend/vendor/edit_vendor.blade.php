@extends('layouts.backend')

@section('title', 'Edit vendor')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Vendor</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateVendor')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                            <img src="{{ url('public/img/vendor/'.$vendor->image) }}"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="width: 150px; height:100px;"></div>
                                        <div>
                                            <small class="text text-danger">{{$errors->first('image')}}</small>

                                            <span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" />
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="id" value="{{$vendor->vendors_id}}">
                            <div class="col-md-3"><strong>Name : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$vendor->name}}" required>
                                <small class="text text-danger">{{$errors->first('name')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;&nbsp;</div>
                            <div class="col-md-3"><strong>Address : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" value="{{$vendor->address}}" required>
                                <small class="text text-danger">{{$errors->first('address')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Contact</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact" value="{{$vendor->contact}}" required>
                                <small class="text text-danger">{{$errors->first('contact')}}</small>
                            </div>
                            <div class="col-md-12">&nbsp;&nbsp;</div>
                            <div class="col-md-3"></div>
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