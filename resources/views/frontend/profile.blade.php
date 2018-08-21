@include('branches.header')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>


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
        </div>

<section id = "about-us" class = " page-section">
    <div class = "container">
        <div class = "section-title" data-animation = "fadeInUp">
            <h1 class ="title">Users Profile</h1>
        </div>
        <div class = "row text-center">
            <div class="col-md-3">
                <div class = "col-sm-12 col-md-12" data-animation = "fadeInUp" style="margin-top: 20px;">
                    <div class = "work-process-box" >
                        <a href="{{route('history')}}">
                            <div class = "active process-content">
                                <!-- Title -->
                                <h4 class = "title">History</h4>
                                <!-- Description -->
                                <p>Click here to go back to history</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-body panel-default">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Name</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control" style="text-transform: uppercase;">{{$traveller->name}}</p>
                            </div>
                            <!-- <div class="col-md-4 col-sm-4">
                                <p class="form-control" style="text-transform: uppercase;">LastName</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">E-mail</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$traveller->email}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Address</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$traveller->address}}</p>
                            </div>
                            <!-- <div class="col-md-3 col-sm-3">
                                <p class="form-control">District</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <p class="form-control">Zone</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Contact</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$traveller->contact}}</p>
                            </div>
                            <!--  <div class="col-md-4 col-sm-4">
                                <p class="form-control">Contact2</p>
                             </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-4 col-sm-4">
                                <a href="{{route('editProfile')}}" class="btn btn-info form-control" style="color: white; background-color: #dd4a2a;">Edit</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Change Password</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-12">
                <img src="https://www.bigchangeapps.com/wp-content/uploads/2015/09/screen-phone3D-express-resource.png">
            </div>

        </div>
    </div>

</section>
@include('branches.footer')

