@extends('layouts.backend')

@section('title', 'Edit Menu')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">Edit Menu</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('updateMenu')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3">&nbsp;</div>
                        <input type="hidden" name="id" value="{{$menu->menus_id}}">
                        <div class="col-md-9">
                            <div class="col-md-3"><strong>Title : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" value="{{$menu->title}}" required>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Parent Id : *</strong></div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="parent_id" id="menus" class="form-control">
                                        @foreach($menus as $key)
                                            <option>None</option>
                                            <option value="{{ $key->menus_id }}"
                                             @php
                                                if($key->menus_id == $menu->parent_id) echo "selected" ;
                                            @endphp>{{ $key->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <strong class="text-danger">{{$errors->first('parent_id')}}</strong>
                            </div>

                            <div class="col-md-3"><strong>Order : *</strong></div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="page" value="{{$menu->order}}">
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-3"><strong>Url : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url" value="{{$menu->url}}">
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3">&nbsp;</div>
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
                </form>
            </div>
        </div>
    </div>
@endsection