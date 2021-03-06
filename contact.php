<?php

include('header.php');

?>
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/about.jpg') center;">
            <div class="bg-overlay bg-gradient-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <small class="text-white-50 mb-1 fw-medium text-uppercase mx-auto">Get in touch</small>
                            <h5 class="heading fw-semibold mb-0 page-heading text-white">Contact us</h5>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="position-middle-bottom">
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                            <li class="breadcrumb-item"><a href="index-2.html">Starty</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ul>
                    </nav>
                </div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center features feature-clean bg-transparent">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="footer-head">Phone</h5>
                                <p class="text-muted">Start working with Starty that can provide everything</p>
                                <a href="tel:+152534-468-854" class="text-foot">+152 534-468-854</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean bg-transparent">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="footer-head">Email</h5>
                                <p class="text-muted">Start working with Starty that can provide everything</p>
                                <a href="mailto:contact@example.com" class="text-foot">contact@example.com</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean bg-transparent">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="footer-head">Location</h5>
                                <p class="text-muted">C/54 Northwest Freeway, Suite 558, <br>Houston, USA 485</p>
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                    data-type="iframe" class="video-play-icon text-foot lightbox">View on Google map</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title mb-5 pb-2 text-center">
                            <h4 class="title mb-3">Get In Touch !</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Our design projects are fresh and simple and will benefit your business greatly. Learn more about our work!</p>
                        </div>
                        <div class="custom-form">
                            <form method="post" name="myForm" onsubmit="return validateForm()">
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Name :">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control" placeholder="Email :">
                                        </div> 
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Subject</label>
                                                <input name="subject" id="subject" class="form-control" placeholder="Subject :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-100 mt-60">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card map border-0">
                            <div class="card-body p-0">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <?php
        include('footer.php');
        ?>
    </body>

<!-- Mirrored from shreethemes.in/starty/page-contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jan 2022 13:15:13 GMT -->
</html>