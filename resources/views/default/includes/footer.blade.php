<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="/" class="logo-footer">
                        @if($siteData)
                        <img src="{{ asset($siteData->logo) }}" alt="logo" width="43" height="43" />
                        @else
                        <img src="/assets/images/logo.jpg" alt="logo-footer" width="43" height="43">
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
                                <label>Email:</label>
                                <a href="/cdn-cgi/l/email-protection#4d202c24210d3f24222928632e2220"><span
                                        class="__cf_email__" data-cfemail="f19c90989db183989e9594df929e9c">[{{$siteData
                                        ? $siteData->email : "email"}}&#160;protected]</span></a>
                            </li>
                            <li>
                                <label>Address:</label>
                                <a href="#">{{$siteData ? $siteData->address : "Address"}}</a>
                            </li>
                            <li>
                                <label>WORKING DAYS / HOURS:</label>
                            </li>
                            <li>
                                <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="about-us.html">About Us</a>
                            </li>
                            <li>
                                <a href="#">Order History</a>
                            </li>
                            <li>
                                <a href="#">Returns</a>
                            </li>
                            <li>
                                <a href="#">Custom Service</a>
                            </li>
                            <li>
                                <a href="#">Terms &amp; Condition</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="widget-body">
                            <li>
                                <a href="#">Sign in</a>
                            </li>
                            <li>
                                <a href="/cart">View Cart</a>
                            </li>
                            <li>
                                <a href="/wishlist">My Wishlist</a>
                            </li>
                            <li>
                                <a href="#">Track My Order</a>
                            </li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-instagram">
                        <h4 class="widget-title">Instagram</h4>
                        <figure class="widget-body row">
                            <div class="col-3">
                                <img src="/assets/images/instagram/01.jpg" alt="instagram 1" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/02.jpg" alt="instagram 2" width="64" height="64">
                            </div>
                            <div class="col-3">
                                <img src="/assets/images/instagram/03.jpg" alt="instagram 3" width="64" height="64">
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
                        </figure>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-left">
                <figure class="payment">
                    <img src="/assets/images/payment.png" alt="payment" width="159" height="29">
                </figure>
            </div>
            <div class="footer-center">
                <p class="copyright">SRM Kart &copy; 2024. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="#" title="social-link" class="social-link social-facebook fab fa-facebook-f"></a>
                    <a href="#" title="social-link" class="social-link social-twitter fab fa-twitter"></a>
                    <a href="#" title="social-link" class="social-link social-linkedin fab fa-linkedin-in"></a>
                </div>
            </div>
        </div>

    </div>
</footer>