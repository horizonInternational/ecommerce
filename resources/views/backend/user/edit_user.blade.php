@extends('layouts.backend')

@section('title', 'Edit User')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit User</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                            <img src="{{ url('public/img/user/'.$user->image) }}"/>
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
                            <input type="hidden" name="id" value="{{$user->users_id}}">
                            {{--<div class="col-md-3"><strong>Name : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}" required>--}}
                                {{--<small class="text text-danger">{{$errors->first('name')}}</small>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}
                            <div class="col-md-3"><strong>Email : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email" required>
                                <small class="text text-danger">{{$errors->first('password')}}</small>

                            </div>
                            <div class="col-md-12">&nbsp;&nbsp;</div>
                            {{--<div class="col-md-3"><strong>Username : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="username" value="{{$user->username}}" placeholder="Username">--}}
                                {{--<small class="text text-danger">{{$errors->first('username')}}</small>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}
                            <div class="col-md-3"><strong>User Type:</strong></div>
                            <div class="col-md-9">
                                <input type="radio" name="user_type" value="admin" @php if($user->user_type=='admin') echo 'checked'; @endphp> Admin&ensp;
                                <input type="radio" name="user_type" value="user" @php if($user->user_type=='traveller') echo 'checked'; @endphp> Traveller
                                <input type="radio" name="user_type" value="user" @php if($user->user_type=='vendor') echo 'checked'; @endphp> Vendor
                                <small class="text text-danger">{{$errors->first('user_type')}}</small>

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