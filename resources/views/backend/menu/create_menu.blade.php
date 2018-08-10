@extends('layouts.backend')

@section('title', 'Create Menu')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#menus').select2();
        });
    </script>
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Create Menu</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('storeMenu')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">
                      &nbsp;
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Title : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" placeholder="title" required>
                                <strong class="text-danger">{{$errors->first('title')}}</strong>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Parent : *</strong></div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="parent_id" id="menus" class="form-control" >
                                        <option value="0" selected>None</option>
                                        @foreach($menus as $key)
                                            <option value="{{ $key->menus_id }}">{{ $key->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <strong class="text-danger">{{$errors->first('parent_id')}}</strong>
                            </div>

                            <div class="col-md-3"><strong>Url : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url" placeholder="Url" >
                                <strong class="text-danger">{{$errors->first('url')}}</strong>

                            </div>
                        <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Order : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="order" placeholder="Order" >
                                <strong class="text-danger">{{$errors->first('order')}}</strong>
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
