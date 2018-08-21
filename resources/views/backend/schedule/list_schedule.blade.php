@extends('layouts.backend')

@section('title', 'User')
@section('activeSchedule', 'active')
@section('content')

    <script>
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    </script>

    <div class="col-lg-9 main-chart">
        <div>
            <h4><b>Schedule</b>&nbsp;&nbsp;&nbsp;<a href="{{route('createSchedule')}}" class="btn btn-default">+ Add New</a></h4>
        </div>
        <div class="panel panel-default">
            {{--<div class="panel-heading" align="center">--}}
            {{--<h3 class="panel-title"><b>Team</b></h3>--}}
            {{--</div>--}}
            <div class="panel-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert" align="center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{session()->get('success')}}</strong>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert" align="center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{session()->get('error')}}</strong>
                    </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Bus</th>
                        <th>DepartureDate</th>
                        <th>DepartureTime</th>
                        <th>Shift</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $count => $key)
                        <tr>
                            <td>{{++$count}}</td>
                            <td>{{$key->buses->title}}</td>
                            <td>{{$key->departure_date}}</td>
                            <td>{{$key->departure_time}}</td>
                            <td>{{$key->shift}}  </td>
                            <td>
                                <table>
                                    <tr>
                                        <th>
                                            <form action="{{route('showSchedule')."/".$key->schedules_id}}" method="get">
                                                <button type="submit" class="btn btn-info btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </form>
                                        </th>
                                        <th>&nbsp;</th>
                                        <th>
                                            <form action="{{route('editSchedule')."/".$key->schedules_id}}" method="get">
                                                <button type="submit" class="btn btn-success btn-xs">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </th>
                                        <th>&nbsp;&nbsp;</th>
                                        <th>
                                            <form class="client" action="{{route('destroySchedule')}}" method="post" onsubmit=" return ConfirmDelete()">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$key->schedules_id}}">
                                                <button type="submit" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12" align="center">{{ $schedules->links() }}</div>
    </div>

    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection