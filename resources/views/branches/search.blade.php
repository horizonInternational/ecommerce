
<div class="row"  id="pagesearch" style = "background-image: url({{url('public/frontend/assets/uploads/images/6.jpg')}}); min-height: 170px;" >
    <div class = "search-form " style="margin-top: 50px;">
        <div class = "search-form">
            <div class = "container">
                <form action="" method="get">

                    <div class = "form-row align-items-center">
                        <div class = " col-xs-12 col-sm-3">
                            <input type = "text" class = "form-control" placeholder = "Departure">
                        </div>
                        <div class = " col-xs-12 col-sm-3">
                            <input type = "text" class = "form-control" placeholder = "Destination">
                        </div>

                        <div class = " col-xs-12 col-sm-3" id="nrt_date">
                            <input type = "text" class = "form-control datepicker" name="date" id="date" placeholder = "Depart">
                        </div>

                        <div class="col-xs-12 col-sm-3" id="rt_date" style="display: none;">
                            <div class="row ">
                                <div class="col-md-6 col-sm-3" >
                                    <input type="text" class="form-control datepicker"  name="date" id="date" placeholder="Depart">
                                </div>
                                <div class="col-md-6 col-sm-3">
                                    <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Return">
                                </div>
                            </div>
                        </div>

                        <div class = " col-xs-10 col-sm-2">
                            <div class="input-group number-spinner ">
                        <span class="input-group-btn ">
                            <a class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                        </span>
                                <input type="text" disabled name="child" id="child" class="form-control text-center" placeholder="Seats" max=9 min=0>
                                <span class="input-group-btn ">
                            <a class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                        </span>
                            </div>
                        </div>

                        <div class = "col-xs-8 col-sm-1">
                            <button type = "submit" class=" btn btnx" style="background: #40d4e4">Submit</button>
                        </div>

                    </div>
                    <div class = "clearfix"></div>
                    <div class = "form-row returnTic">
                        <div class = "col-sm-6 col-md-4">
                            <div class = "form-check">
                                <input class = "form-check-input " type = "checkbox" id = "autoSizingCheck2">
                                <label class = "form-check-label" for = "autoSizingCheck2" >
                                    I Need a Return Ticket too.
                                </label>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
