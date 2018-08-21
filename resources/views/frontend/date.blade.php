<!--search form-->
<section class="primary-search-form"
         style="background-image: url('<?php echo Yii::$app->request->baseUrl; ?>/common/assets/uploads/images/6.jpg')">
    <div class="search-form">
        <div class="container">
            <form action="search.php" method="get">
                <div class="form-row align-items-center">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Departure">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Destination">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" class="form-control datepicker" name="date" id="date"
                               placeholder="Check In">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" type="number" placeholder="Seats">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!--
                <div class = "clearfix"></div>
                <div class = "form-row">
                    <div class = "col-sm-12">
                        <div class = "form-check">
                            <input class = "form-check-input" type = "checkbox" id = "autoSizingCheck2">
                            <label class = "form-check-label" for = "autoSizingCheck2">
                                I Need a Return Ticket too.
                            </label>
                        </div>
                    </div>

                </div>
                -->
            </form>
        </div>
    </div>

</section>


<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="https://beegul.com" data-width="500px" data-numposts="5"></div>


<div class="fb-comments" data-href="https://beegul.com" data-width="500px" data-numposts="5"></div>