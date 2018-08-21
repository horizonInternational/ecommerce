@extends('layouts.backend')

@section('title', 'Create User')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create User</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeUser')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                            <img src="{{ url('public/img/user/avatar.jpg') }}"/>
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
                            {{--<div class="col-md-3"><strong>Name : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="name" placeholder="Name" required>--}}
                                {{--<small class="text text-danger">{{$errors->first('name')}}</small>--}}

                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}
                            <div class="col-md-3"><strong>Email : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                                <small class="text text-danger">{{$errors->first('email')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;&nbsp;</div>
                            {{--<div class="col-md-3"><strong>Username : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="username" placeholder="Username">--}}
                                {{--<small class="text text-danger">{{$errors->first('username')}}</small>--}}

                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}
                            <div class="col-md-3"><strong>User Type</strong></div>
                            <div class="col-md-9">
                                <input type="radio" name="user_type" value="admin"> Admin&ensp;
                                <input type="radio" name="user_type" value="user"> User
                                <small class="text text-danger">{{$errors->first('user_type')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Password</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="password" placeholder="Password">
                                <small class="text text-danger">{{$errors->first('password')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Confirm Password</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="password_confirmation"
                                       placeholder="Confirm Password">
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