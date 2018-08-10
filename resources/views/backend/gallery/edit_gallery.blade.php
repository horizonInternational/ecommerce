@extends('layouts.backend')

@section('title', 'Edit Gallery')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Gallery</h3>
            </div>
            <div class="panel-body" align="center">
                <form action="{{route('updateGallery')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{$gallery->galleries_id}}">
                            <input type="text" class="form-control" name="title" value="{{ $gallery->title }}" required>
                        </div>
                        <div class="col-md-12">&nbsp;&nbsp;</div>
                        <div class="col-md-12">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 700px; height:200px;">
                                            <img src="{{ url('public/img/gallery/'.$gallery->image) }}" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 700px; height:200px;"></div>
                                        <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image"/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;&nbsp;</div>
                        <div align="center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                Save Changes
                            </button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection