<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="/" class="logo-footer">
                        @if($siteData)
                        <img src="{{ asset($siteData->logo) }}" alt="logo" class="bg-white" width="43" height="43" />
                        @else
                        <img src="/assets/images/logo.jpg" alt="logo-footer" class="bg-white" width="43" height="43">
                        @endif
                    </a>



                </div>
                <div class="col-lg-9">
                    <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                        <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                            <h4 class="widget-title">Subscribe to our Newsletter</h4>
                            <p>Get all the latest information, Sales and Offers.</p>
                        </div>
                        <form action="#" class="input-wrapper input-wrapper-inline">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email address here..." required="">
                            <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                                    class="d-icon-arrow-right"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-info">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="widget-body">
                            <li>
                                <label>Phone:</label>
                                <a href="tel:#">Toll Free {{$siteData ? $siteData->mobile : "Mobile No"}}</a>
                            </li>
                            <li>
                                <label>Phone:</label>
                                <a href="tel:#">
                                    7665433060
                                </a>
                            </li>
                            <li>
                                <label>Phone:</label>
                                <a href="tel:#">7665433060</a>
                            </li>
                            <li>
                                <label>Email:</label>
                                <a href="/cdn-cgi/l/email-protection#4d202c24210d3f24222928632e2220"><span
                                        class="__cf_email__" data-cfemail="f19c90989db183989e9594df929e9c">[{{$siteData
                                        ? $siteData->email : "email"}}]</span></a>
                            </li>
                            <!--<li>-->
                            <!--    <label>Address:</label>-->
                            <!--    <a href="#">{{$siteData ? $siteData->address : "Address"}}</a>-->
                            <!--</li>-->
                            <li>
                                <label>WORKING DAYS / HOURS:</label>
                            </li>
                            <li>
                                <a href="#">Mon - Sun / 24*7 Hrs.</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Quick Link</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="/about-us">About Us</a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="#">Order History</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="#">Returns</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="#">Custom Service</a>-->
                            <!--</li>-->
                            <li>
                                <a href="/terms-and-conditions">Terms &amp; Condition</a>
                            </li>
                            <li>
                                <a href="/help">Help</a>
                            </li>
                            
                             <li>
                                <a href="/refund-policy">Refund Policy</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Our Services</h4>
                        <ul class="widget-body">
                            <!--<li>-->
                            <!--    <a href="#">Sign in</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/cart">View Cart</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/wishlist">My Wishlist</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="#">Track My Order</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/help">Help</a>-->
                            <!--</li>-->
                            <li>
                                <a href="/food">Food</a>
                            </li>
                            <li>
                                <a href="/rent-for-property">Prperty For Rent</a>
                            </li>
                            <li>
                                <a href="/printout">PrintOut</a>
                            </li>
                            <li>
                                <a href="/assignment">Assignment</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Internship</h4>
                        <ul class="widget-body">
                            <!--<li>-->
                            <!--    <a href="#">Sign in</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/cart">View Cart</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/wishlist">My Wishlist</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="#">Track My Order</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="/help">Help</a>-->
                            <!--</li>-->
                            <li>
                                <a href="/internship/cc7a5d8b-e40c-44c5-bf6c-27142663d463/enquiry">Adobe Photoshop</a>
                            </li>
                            <li>
                                <a href="/internship/42c3eb28-33de-44f6-ba90-bf2e42cd29c3/enquiry">AutoCad</a>
                            </li>
                            <li>
                            <a href="/internship/782c987c-c2a0-49ca-95fb-9b38918bf222/enquiry">Affiliate Marketing</a>
                            </li>
                            <!-- <li>
                                <a href="/assignment">Assignment</a>
                            </li> -->
                        </ul>
                        <!-- <figure class="widget-body row">
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/04.jpg" alt="instagram 4" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/05.jpg" alt="instagram 5" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/06.jpg" alt="instagram 6" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/07.jpg" alt="instagram 7" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/08.jpg" alt="instagram 8" width="64" height="64">
                            </div>
                        </figure> -->
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-left">
                <!-- <figure class="payment">
                    <img src="/assets/images/payment.png" alt="payment" width="159" height="29">
                </figure> -->
            </div>
            <div class="footer-center">
                <p class="copyright">SRM Kart &copy; 2024. All Rights Reserved</p>
            </div>
            <div class="footer-right" style="padding-right: 74px;">
                <div class="social-links">
                    <a  href="{{!empty($siteData->instagram) ? $siteData->instagram : '#'}}" title="social-link">
                        <img src="/assets/images/instagram.png" alt="" width="32px" height="32px">
                    </a>
                    <!-- <a title="social-link" class="social-link social-facebook fab fa-instagram"></a> -->
                    <!-- <a href="#" title="social-link" class="social-link social-twitter fab fa-twitter"></a>
                    <a href="#" title="social-link" class="social-link social-linkedin fab fa-linkedin-in"></a> -->
                </div>
            </div>
        </div>

    </div>
</footer>