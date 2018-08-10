@extends('layouts.backend')

@section('title', 'Edit Blog')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Blog</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateBlog')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$blog->blogs_id}}">
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height:110px;">
                                            <img src="{{ url('public/img/blog/'.$blog->image) }}"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="width: 160px; height:110px;"></div>
                                        <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" value="{{$blog->image}}"/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Title : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" value="{{$blog->title}}"
                                       placeholder="title" required>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Post By: *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="posted_by" value="{{$blog->posted_by}}"
                                       placeholder="Postby" required>
                            </div>

                            <div class="col-md-12">&nbsp;</div>
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
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Description : *</strong></div>
                        <div class="col-md-9">&nbsp;</div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                                <textarea class="form-control " name="description" id="description" rows="20"
                                          style="resize: none" required>
                                    {{$blog->description}}
                                </textarea>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection