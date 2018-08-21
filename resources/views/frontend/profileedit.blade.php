@include('branches.header')



<section id="about-us" class=" page-section">
        <div class="container">
            <div class="section-title" data-animation="fadeInUp">
                <h1 class="title">Edit Profile</h1>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="col-sm-12 col-md-12" data-animation="fadeInUp" style="margin-top: 20px;">
                        <div class="work-process-box">
                            <a href="{{route('profile')}}">
                                <div class="active process-content">
                                    <!-- Title -->
                                    <h4 class="title">Profile</h4>
                                    <!-- Description -->
                                    <p>Click here to go back to view Profile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="panel panel-body panel-default">
                        <form action="{{route('updateProfile')}}" method="post">
                            {{@csrf_field()}}
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Name</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="{{$traveller->name}}" name="name" class="form-control"
                                           style="text-transform: uppercase;">
                                </div>
                                <!-- <div class="col-md-4 col-sm-4">
                                    <input type="text" value="lastname" class="form-control" style="text-transform: uppercase;">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">E-mail</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="email" name="email" value="{{$traveller->email}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Address</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="address" value="{{$traveller->address}}" class="form-control">
                                </div>
                                <!-- <div class="col-md-3 col-sm-3">
                                    <input type="text" value="district" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input type="text" value="zone" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Contact</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="contact" value="{{$traveller->contact}}" class="form-control">
                                </div>
                                <!-- <div class="col-md-4 col-sm-4">
                                   <input type="text" value="contact2" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">&nbsp;</div>
                                <div class="col-md-4 col-sm-12">
                                    <button class="btn btn-info form-control"
                                            style="color: white; background-color: #96b43c;">Submit</button>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <button class="btn btn-info form-control"
                                            style="color: white; background-color: #40d4e4;">Change Password</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


                <div class="col-md-3 col-sm-12">
                    <img src="https://www.bigchangeapps.com/wp-content/uploads/2015/09/screen-phone3D-express-resource.png">
                </div>

            </div>
        </div>
    </section>


@include('branches.footer')