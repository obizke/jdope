	<!---footer--->
    <div class="footer-w3l">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid">
                    <h4>About </h4>
                    @foreach ($abouts as $about)
                    <p>{!!$about->description!!}</p>
                    @endforeach
                    <div class="social-icon">
                        <a href="#"><i class="icon"></i></a>
                        <a href="#"><i class="icon1"></i></a>
                        <a href="#"><i class="icon2"></i></a>
                        <a href="#"><i class="icon3"></i></a>
                    </div>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>My Cart</h4>
                    <ul>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/shop">Products</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-3 footer-grid foot">
                    <h4>Contacts</h4>
                    <ul>
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">Moi Avenue Rd,Nairobi,Kenya</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">+254 791 361 236</a></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="#"> info@jdopewear.co.ke</a></li>
                        
                    </ul>
                </div>
            <div class="clearfix"> </div>
            </div>
            
        </div>
    </div>
    <!---footer--->
    <!--copy-->
    <div class="copy-section">
        <div class="container">
            <div class="auto-container text-center fs-13">
                <p class="tp-mb0">&copy; Copyright {{ now()->year }} by <span class="color-theme">Jdope wear</span> | All rights reserved</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>