@extends('layouts.frontend')
@section('content')
<section id = "about-us" class = "page-section">
<div class = "container">
    <!-- heading -->
    <div class = "section-title" data-animation = "fadeInUp">
        <h1 class = "title">User's History</h1>
    </div>

    <!-- history -->

    <div class = "row text-center">
        <div class="col-md-3">
            <div class = "col-sm-12 col-md-12" data-animation = "fadeInUp" style="margin-top: 40px;">
                <div class = "work-process-box" >
                    <a href="{{route('profile')}}">
                        <div class = "active process-content">
                                <!-- Title -->
                            <h4 class = "title">Profile</h4>
                                <!-- Description -->
                            <p>Click here to go back to Profile</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>    

<!-- history details -->

        <div class="col-md-6 col-sm-12">
            <div class="panel panel-body panel-default">
                <div class = "section-title" data-animation = "fadeInUp">
                    <h1 class = "title" style="font-size: 20px">History Details 1</h1>
                </div>

              <div class="row">
                   <label class="col-md-3 col-sm-3">Date</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">2018-5-04</p>
                        </div>

                    <label class="col-md-3 col-sm-3">Time</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">12:40 pm</p>
                        </div>
                </div>
                <div class="row">
                   <label class="col-md-3 col-sm-3">Shift</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">Day Shift</p>
                        </div>

                    <label class="col-md-3 col-sm-3">Seat</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">1 and 2</p>
                        </div>
                </div>

                <div class="row">
                    <table class="table table-bordered table-striped">
                <tr>
                    <th><center>Bus Name</center></th>
                    <th><center>Route Name</center></th>
                    <th><center>Price</center></th>
                </tr>
                <tr>
                    <td>Nepal Yatayat</td>
                    <td>ABC</td>
                    <td>Rs.1200</td>
                </tr>
                </table>
            </div>
        </div>
 
 <!-- history details 2 -->
        
            <div class="panel panel-body panel-default">
                <div class = "section-title" data-animation = "fadeInUp">
                    <h1 class = "title" style="font-size: 20px">History Details 2</h1>
                </div>

              <div class="row">
                   <label class="col-md-3 col-sm-3">Date</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">2018-5-04</p>
                        </div>

                    <label class="col-md-3 col-sm-3">Time</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">12:40 pm</p>
                        </div>
                </div>
                <div class="row">
                   <label class="col-md-3 col-sm-3">Shift</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">Day Shift</p>
                        </div>

                    <label class="col-md-3 col-sm-3">Seat</label>
                        <div class="col-md-3 col-sm-3">
                            <p class="form-control">1 and 2</p>
                        </div>
                </div>

                <div class="row">
                    <table class="table table-bordered table-striped">
                <tr>
                    <th><center>Bus Name</center></th>
                    <th><center>Route Name</center></th>
                    <th><center>Price</center></th>
                </tr>
                <tr>
                    <td>Nepal Yatayat</td>
                    <td>ABC</td>
                    <td>Rs.1200</td>
                </tr>
                </table>
            </div>
        </div>
            
         </div>
        <!-- end of history details 2 -->
        
        <div class="col-md-3 col-sm-12">
            <img src="https://www.bigchangeapps.com/wp-content/uploads/2015/09/screen-phone3D-express-resource.png">
        </div>

    </div>          
</div>

</section>
@endsection