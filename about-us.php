<?php


include('header.php');


// get home banner
$filter = array(
    'table' => 'ci_banners',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '',
    'limit' => '1',
    'where' => 'is_active=1 AND id=1'
);
$bannerData = postData('listing', $filter);


// get all  categories

$filter = array(
    'table' => 'ci_gallery',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '',
    'limit' => '3',
    'where' => 'is_active=1 AND type=1'
);
$gallary_categories = getData('catwithphotos', 1);




// get all categories images

$filter = array(
    'table' => 'ci_gallery_details',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '',
    'limit' => '8',
    'where' => 'is_active=1 AND type=1'
);
$gallary_images = postData('listing', $filter);





// get testimonial
$filter = array(
    'table' => 'ci_testimonials',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '1',
    'limit' => '5',
    'where' => 'is_active=1'
);
$testimonials = postData('listing', $filter);





$about_banner = $bannerData['data'][0];


// Cms Data

$advatage_section_data = getData('cms', 6);


$about_content = getData('cms', '4');

$about_site_image = getData('sideimage', 2);





// GET ALL SERVICES 

$filter = array(
    'table' => 'ci_services',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '0',
    'limit' => '10',
    'where' => 'is_active=1 and is_feature=1'
);





// get generakll settings
$general_settings = getData('setting');

?>



<!-- Content -->
<div role="main" id="content">

    <!-- Page info -->
    <? if (check_data_exist($bannerData)) { ?>
        <div class="biv-page biv-background" data-src="<?= ADMIN_PATH . $about_banner['image'] ?>">
            <div class="biv-page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 offset-xl-3 offset-lg-2">
                            <div class="biv-page-info">
                                <div class="biv-page-info-url">
                                    <ul>
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <span><?= $about_banner['title_first'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="biv-page-info-title">
                                    <h1><?= $about_banner['title_first'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>



    <!-- About us -->
    <? if (check_data_exist($about_content) && check_data_exist($about_site_image)) { ?>
        <div class="biv-about">
            <div class="biv-about-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="biv-about-img">
                                <span class="biv-background-size" data-src="<?= ADMIN_PATH . $about_site_image['data']['image'] ?>"></span>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <?= $about_content['data']['cms_contant']; ?>
                            <div class="biv-about-info-btns">
                                <a href="tours.html" class="biv-about-info-btn1 btn-type-1 btn-color-1">Our tours</a>
                                <a href="tel:<?= $general_settings['data']['first_phone'] ?>" class="biv-about-info-btn2 btn-type-2 btn-color-1"><?= $general_settings['data']['first_phone'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>


    <!-- Our advantages -->
    <? if (check_data_exist($advatage_section_data)) {

        echo  $advatage_section_data['data']['cms_contant'];
    } ?>



    <? if (check_data_exist($gallary_images)) { ?>
        <!-- Gallery -->
        <div class="biv-gallery">
            <div class="biv-gallery-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="biv-gallery-info">
                                <div class="biv-gallery-info-title">
                                    <h2>Gallery</h2>
                                </div>
                                <div class="biv-gallery-info-desc">Latest photos</div>
                                <? if (check_data_exist(($gallary_categories))) { ?>
                                    <div class="biv-gallery-sections">

                                        <div class="biv-gallery-sections-items">
                                            <span class="active cat-menu" onclick="get_images('ALL',this)">All</span>
                                            <? foreach ($gallary_categories['data'] as $key => $value) { ?>
                                                <span class="cat-menu" onclick="get_images('<?=$value['id']?>',this)"><?= $value['album'] ?></span>
                                            <? } ?>
                                        </div>
                                        <div class="biv-gallery-sections-loading display-none">
                                            <span></span>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row biv-gallery-fixed" id="bivGalleryList">

                        <? foreach ($gallary_images['data'] as $key => $value) {
                            

                           

                            if($key==0)
                            {
                                $class = "col-xl-8 col-lg-8 col-md-8 col-sm-6";
                            }
                            elseif($key==1)
                            {
                                $class = "col-xl-4 col-lg-4 col-md-4 col-sm-6";
                            }
                            else
                            {
                                $class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"; 
                            }

                           
                        ?>


                            <div class="<?=$class?> biv-gallery-section biv-gallery-section-1 all_images">
                                <div class="biv-gallery-item biv-photo-viewer-item" data-src="img/tours/full/01.jpg">
                                    <span class="biv-background" data-src="<?=ADMIN_PATH.$value['value']?>"></span>
                                </div>
                            </div>

                        <? } ?>



                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="photo-gallery.php" class="biv-about-info-btn1 btn-type-1 btn-color-1 ">View More</a>
            </div>
        </div>

    <? } ?>




    <!-- Testimonials -->
    <? if (check_data_exist($testimonials)) { ?>
        <div class="biv-testimonials-t">
            <div class="biv-testimonials-t-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 offset-xl-2 offset-lg-1">
                            <div class="biv-testimonials-t-info">
                                <div class="biv-testimonials-t-info-title">
                                    <h2>Why choose us</h2>
                                </div>
                                <div class="biv-testimonials-t-info-desc">Feedback from our clients</div>
                            </div>
                            <div class="biv-testimonials-t-items">

                                <!-- Testimonials -->
                                <? if (isset($testimonials['data']) && !empty($testimonials['data'])) {

                                    foreach ($testimonials['data'] as $key => $value) {

                                ?>

                                        <div class="biv-testimonials-t-item">
                                            <div class="biv-testimonials-t-item-img">
                                                <span class="biv-background" data-src="<?= ADMIN_PATH . $value['image'] ?>"></span>
                                            </div>
                                            <div class="biv-testimonials-t-item-info">
                                                <div class="biv-testimonials-t-item-info-text">
                                                    <span><?= $value['message'] ?></span>
                                                </div>
                                                <div class="biv-testimonials-t-item-info-name"><?= $value['name'] ?></div>
                                                <!-- <div class="biv-testimonials-t-item-info-rating"></div> -->
                                            </div>
                                        </div>

                                <? }
                                } ?>



                                <div class="biv-testimonials-t-item-btn-left" onclick="BivReviewsPrevBtn();"></div>
                                <div class="biv-testimonials-t-item-btn-right" onclick="BivReviewsNextBtn();"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>


</div>

<?php include('footer.php') ?>
