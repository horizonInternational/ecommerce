@extends('layouts.frontend')


@section('content')
    @include('branches.search')
    <div class="container-fluid">
        <div class="row search_body">
            <div class="col-md-12">
                <div class="col-md-3" style="position: static">
                    <span style="position:absolute; bottom:0px;" class="pull-left">Filter your Search </span>
                </div>
                <div class="col-md-9">
                    <span class="h3">{{ucfirst($from).' to '.ucfirst($to)}}</span>
                    <p>There are {{$count}} buses for this route at the moment </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid searchh ">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <form action="{{route('searchFilter')}}" method="post">
                    {{@csrf_field()}}
                    <input type="hidden" name="to" value="{{$to}}">
                    <input type="hidden" name="from" value="{{$from}}">
                    <input type="hidden" name="departure_date" value="{{$departure_date}}">
                    <input type="hidden" name="arrival_date" value="{{$arrival_date}}">
                    <input type="hidden" name="seat" value="{{$seat}}">
                    <div class="container">
                    <div class="panel search_text">

                        <div class="row">
                            <div class="col-md-12 ">
                                <li>Bus Type</li>
                                @foreach($bustypes as $bus)
                                    <input type="checkbox" name="bustype" value="{{$bus->bustypes_id}}"
                                    size="small" class="bhh" @if($bustype==$bus->bustypes_id) checked @endif>{{ $bus->title}}<br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="panel search_text">
                        <div class="row">
                            <div class="col-md-12 ">
                                <li>Choose shift</li>
                                <input type="checkbox" name="shift" value="day" class="chh" @if($shift=='day') checked @endif> Day<br>
                                <input type="checkbox" name="shift" value="night" class="chh"  @if($shift=='night') checked @endif> Night<br>
                            </div>
                        </div>
                    </div>
                    <div class="panel search_text">
                        <div class="row">
                            <div class="col-md-12 ">
                                <li>Sort by price</li>
                                <input type="checkbox" name="price" value="ASC" class="dhh"  @if($price=='ASC') checked @endif>Cheap<br>
                                <input type="checkbox" name="price" value="DESC" class="dhh"  @if($price=='DESC') checked @endif>Expensive<br>
                            </div>
                        </div>
                    </div>
                    <div class="panel search_text">
                        <div class="row">
                            <div class="col-md-12 ">
                                <button class="btn btn-default" type="submit">Apply filter</button>
                                <button class="btn btn-default"><a href="{{route('home')}}">Reset All</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 ">
                <div class="container">
                    <div class="panel">
                        <div class="  row">
                            <div class=" col-md-12 col-sm-12 col-xs-12 search_text">
                                <div class="col-md-4">
                                    <div class="panel-title">
                                        Buses
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="panel-title">
                                        Departure
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="panel-title">
                                        Arrival
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="panel-title">
                                        Price
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="panel-title">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($results as $result)
                        <div class="panel">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 search_text">
                                    <div class="col-md-4 col-xs-4">
                                        <div class="panel-title">
                                            {{$result->bustitle}}
                                        </div>
                                        <p><span class="text-danger">{{$result->bustypes_title}}</span></p>
                                        <p><span class="text-primary">{{ucfirst($result->shift)}} </span></p>
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <div class="panel-title">
                                            {{$result->departure_date}}
                                            <br>
                                            {{$result->departure_time}}
                                        </div>
                                        {{--<p>Boarding Point</p>--}}
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <div class="panel-title">
                                            {{$result->arrival_date}}
                                            <br>
                                            {{$result->arrival_time}}
                                        </div>
                                        {{--<p>Boarding Point</p>--}}
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <div class="panel-title">
                                        </div>
                                        <p>Price : {{$result->ticket_price}}</p>
                                        <p>48 seat(s)</p>
                                    </div>
                                    <div class="col-md-2 col-xs-2 ">
                                        <button class="btn btn-default">Select</button>
                                        <br>
                                        <br>
                                        <p>Bus details</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    <script>
        $(".chh").change(function() {
            var checked = $(this).is(':checked');
            $(".chh").prop('checked',false);
            if(checked) {
                $(this).prop('checked',true);
            }
        }); $(".dhh").change(function() {
            var checked = $(this).is(':checked');
            $(".dhh").prop('checked',false);
            if(checked) {
                $(this).prop('checked',true);
            }
        }); $(".bhh").change(function() {
            var checked = $(this).is(':checked');
            $(".bhh").prop('checked',false);
            if(checked) {
                $(this).prop('checked',true);
            }
        });
    </script>
@endsection



