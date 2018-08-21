
<!-- Footer -->
<footer id="footer">

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">Contact Information</h3>
                    </div>
                    <!-- Address -->
                    <p>
                        <strong>Office:</strong> Ejosanjal.com <br/>No. 12, Ribon Building
                    </p>
                    <!-- Phone -->
                    <p>
                        <strong>Call Us:</strong> +0 (123) 456-78-90 or <br/>+0 (123) 456-78-90
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">Quick Links</h3>
                    </div>
                    <nav>
                        <ul>
                            <!-- List Items -->
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">About</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('faq')}}">FAQ</a>
                            </li>

                        </ul>
                    </nav>


                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title"> Terms & Policies </h3>
                    </div>
                    <div>
                        <!-- Text -->
                        <p>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside
                            Scoops:</p>
                        <p class="form-message1" style="display: none;"></p>
                        <div class="clearfix"></div>
                        <!-- Form -->

                    </div>
                    <!-- Count -->

                </div>
                <!-- .newsletter -->

                <div class="col-xs-12 col-sm-6 col-md-3 widget">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">About us </h3>
                    </div>
                    <nav>
                        <ul class="footer-blog">
                            <!-- List Items -->
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                    dolor
                                    sit amet, consectetur adipisicing elit.</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <!-- Copyrights -->
                <div class="col-xs-10 col-sm-6 col-md-6"> &copy; 2015
                    <a href="http://zozothemes.com/">ecosanjal.com</a>
                    . Creative Agency. <br/>
                    <!-- Terms Link -->

                    <a href="#">Terms of Use</a>
                    /
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="col-xs-2 col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                    <!-- Goto Top -->
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
</footer>
<!-- footer -->
</div>
<!-- CSRF TOKEN -->
<script>
    $.ajaxSetup({
        data: {
            _csrf: $('meta[name=csrf-token]').prop('content')
        }
    });
</script>



<script src="{{ url('public/frontend/js/plugins.min.js') }}"></script>
<script src="{{ url('public/frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('public/frontend/js/custom.js') }}"></script>


</body>
</html>


