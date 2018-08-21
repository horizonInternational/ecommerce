
@extends('layouts.frontend')
<section id="contact-us" class="page-section">
    <div class="container">

        <strong class="text-danger ">Feel free to leave a message</strong>
        <div class="row">

            <div class="col-md-4">

                <p class="form-message" style="display: none;"></p>
                <div class="contact-form">
                    <!-- Form Begins -->
                    <form role="form" name="contactform" id="contactform" method="post" action="http://zozothemes.com/html/mist/light/php/contact-form.php">
                        <!-- Field 1 -->
                        <div class="input-text form-group">
                            <input type="text" name="contact_name" class="input-name form-control" placeholder="Full Name" />
                        </div>
                        <!-- Field 2 -->
                        <div class="input-email form-group">
                            <input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
                        </div>
                        <!-- Field 3 -->
                        <div class="input-email form-group">
                            <input type="text" name="contact_phone" class="input-phone form-control" placeholder="Phone"/>
                        </div>
                        <!-- Field 4 -->
                        <div class="textarea-message form-group">
                            <textarea name="contact_message" class="textarea-message hight-82 form-control" placeholder="Message" rows="2" ></textarea>
                        </div>
                        <!-- Button -->
                        <button class="btn btn-default btn-block" type="submit">Send Now <i class="icon-paper-plane"></i></button>
                    </form>
                    <!-- Form Ends -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="map-section">
                    <div class="map-canvas"
                         data-zoom="12"
                         data-lat="27.7172"
                         data-lng="85.3240"
                         data-type="roadmap"
                         data-hue="#ffc400"
                         data-title="Austin"
                         data-content="Company Name<br>
									Contact: +012 (345) 6789<br>
									<a href='mailto:info@youremail.com'>info@youremail.com</a>"
                         style="height: 336px;">
                    </div>
                </div>
            </div><!-- map -->
        </div>
        <hr class="pad-10">
        <div class="row">
            <div class="col-md-12 contact-info">
                <div class="row text-center">
                    <address class="col-sm-4 col-md-4">
                        <i class="fa fa-map-marker i-9x icons-circle text-color light-bg hover-black"></i>
                        <div class="title">Address</div>
                        Lainchaur, Kathmandu.
                    </address>
                    <address class="col-sm-4 col-md-4">
                        <i class="fa fa-microphone i-9x icons-circle text-color light-bg hover-black"></i>
                        <div class="title">Phones</div>
                        <div>Support: 01 (345) 6789</div>
                    </address>
                    <address class="col-sm-4 col-md-4">
                        <i class="fa fa-envelope i-9x icons-circle text-color light-bg hover-black"></i>
                        <div class="title">Email Addresses</div>
                        <div>Support: <a href="../../../backend/web/index.php">info@echosanjal.com</a></div>
                    </address>
                </div>
            </div>
        </div>
</section><!-- page-section -->
<div id="get-quote" class="bg-color get-a-quote black text-center" data-appear-animation="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Do You Want To Join With Us? <a class="black"  data-toggle="collapse" data-target="#login">Join Now</a>
            </div>
        </div>
    </div>
</div>

<section id = "clients" class = "page-section tb-pad-30">
    <div class = "container">
        <div class = "section-title text-center" data-animation = "fadeInUp">
            <!-- Heading -->
            <h2 class = "title">Our Bus Partners</h2>
        </div>
        <div class = "row">
            <div class = "col-md-12 text-center" data-animation = "fadeInDown">
                <div class = "owl-carousel navigation-1" data-pagination = "false" data-items = "6" data-autoplay = "true" data-navigation = "true">
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/1.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/2.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/3.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/4.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/5.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/6.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/1.png" width = "150" height = "150" alt = ""/>
                    </a>
                    <a href = "#">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/2.png" width = "150" height = "150" alt = ""/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!-- clients -->