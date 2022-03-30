<?php

include('header.php');

$filter = array(
    'table' => 'ci_blogs',
    'sort' => 'created_at',
    'order' => 'DESC',
    'start' => '',
    'limit' => '20',
    'where' => 'is_active=1',
    'join' => ' LEFT JOIN ci_categories ON ci_categories.id = ci_blogs.id '
);

$blogs = postData('listing',$filter);

?>
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/blog01.jpg') center;">
            <div class="bg-overlay bg-gradient-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h5 class="heading fw-semibold page-heading text-white"><?=$meta_title?></h5>
                            <p class="text-white-50 para-desc mx-auto mb-0"></p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <ul class="nav justify-content-center">
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link <?=(!isset($_GET['cat_id']) || $_GET['cat_id']=='active') ? 'badge btn-primary' :'' ?>"  href="index.php">All</a>
                            </li>
                            <?php if(isset($categories['data']) && !empty($categories['data'])){
                                
                                foreach($categories['data'] as $key => $value)
                                { ?>
                                    <li class="nav-item d-flex align-items-center">
                                        <a class="nav-link <?=(isset($_GET['cat_id']) && $_GET['cat_id']==$value['id']) ? 'badge btn-primary' :'' ?> " href="index.php?cat_id=<?=$value['id']?>"><?php echo $value['name'] ?></a>
                                    </li>
                               <?php }}?>
                                
                            
                            
                            
                        </ul>
                    </div>

                    <?php 
                    
                    if(isset($blogs['data']) && !empty($blogs['data']))
                    {
                        foreach($blogs['data'] as $key => $value)
                        {
                            
                        }
                    }

                    ?>

                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/01.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Corporate</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail.php" class="h5 title text-dark d-block mb-0">Building Your Corporate Identity from Starty</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/02.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Branding</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">The Dark Side of Overnight Success</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/03.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Technology</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">The Right Hand of Business IT World</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/04.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Personal</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">How to Create Your Own Viral Moments</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/05.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Business</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">How to Write a Business Plan For Any Business</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/06.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Marketing</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">Seeing the Customer Journey More Clearly</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/07.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Production</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">The Signs of a Highly Giftable Product</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="images/blog/08.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Business</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">Defining Your Business Target Audience</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image overflow-hidden">
                                <img src="images/blog/09.jpg" class="img-fluid" alt="">

                                <div class="blog-tag">
                                    <a href="javascript:void(0)" class="badge bg-light">Corporate</a>
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="blog-detail-two.html" class="h5 title text-dark d-block mb-0">Running Out of Time & Ideas? Visit Our Blog</a>
                                <p class="text-muted mt-2 mb-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>
                                <a href="blog-detail-two.html" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-left mdi-18px"></i></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-right mdi-18px"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->
    <?php
    include('footer.php');
    ?>
    </body>

<!-- Mirrored from shreethemes.in/starty/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jan 2022 13:15:09 GMT -->
</html>