@extends('layouts.backend')

@section('title', 'Edit Team')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Team</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateTeam')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$team->teams_id}}">
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height:110px;">
                                            <img src="{{ url('public/img/team/'.$team->image) }}"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="width: 160px; height:110px;"></div>
                                        <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" value="{{$team->image}}"/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Title :</strong></div>
                            <div class="col-md-9">
                                <select class="form-control" name="title">
                                    <option value="Mr." @if($team->title=='Mr.')selected @endif>Mr.</option>
                                    <option value="Mrs." @if($team->title=='Mrs.')selected @endif>Mrs.</option>
                                    <option value="Er." @if($team->title=='Er.')selected @endif>Er.</option>
                                </select>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Name : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="{{$team->name}}"
                                       placeholder="your name" required>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Post : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="post" value="{{$team->post}}"
                                       placeholder="your post" required>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Facebook Link :</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="facebook" value="{{$team->facebook}}"
                                       placeholder="facebook link">
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Twitter Link :</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter" value="{{$team->twitter}}"
                                       placeholder="twitter link">
                            </div>
                            <div class="col-md-12">&nbsp;</div>
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