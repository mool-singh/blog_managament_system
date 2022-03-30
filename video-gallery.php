<?


include('header.php');

// get  banner
$filter = array(
    'table' => 'ci_banners',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '0',
    'limit' => '1',
    'where' => 'is_active=1 AND  id=6'
);
$bannerData = postData('listing', $filter);


// get all  categories

$filter = array(
    'table' => 'ci_gallery',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '',
    'limit' => '',
    'where' => 'is_active=1 AND type=2'
);
$gallary_categories = getData('catwithphotos', 'video');





// get all categories images

$filter = array(
    'table' => 'ci_gallery_details',
    'sort' => 'id',
    'order' => 'asc',
    'start' => '',
    'limit' => '8',
    'where' => 'is_active=1 AND type=2'
);
$gallary_images = postData('listing', $filter);



?>

<!-- Content -->
<div role="main" id="content">

    <!-- Page info -->
    <? if (check_data_exist($bannerData)) { ?>
        <div class="biv-page biv-background" data-src="<?= ADMIN_PATH . $bannerData['data'][0]['image'] ?>">
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
                                            <span><?= $bannerData['data'][0]['title_first'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="biv-page-info-title">
                                    <h1><?= $bannerData['data'][0]['title_first'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>

    <!-- Gallery -->


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
                                <div class="biv-gallery-info-desc">Latest Videos</div>
                                <? if (check_data_exist($gallary_categories) && count($gallary_categories['data'])>1) { ?>
                                    <div class="biv-gallery-sections">

                                        <div class="biv-gallery-sections-items">
                                            <span class="active cat-menu" onclick="get_videos('ALL',this,'EQUAL')">All</span>
                                            <? foreach ($gallary_categories['data'] as $key => $value) { ?>
                                                <span class="cat-menu" onclick="get_videos('<?= $value['id'] ?>',this)"><?= $value['album'] ?></span>
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

                        <? foreach ($gallary_images['data'] as $key => $value) { ?>


                            <div data-cat="ALL" data-id="<?= $value['id'] ?>" class="gallery_img col-xl-4 col-lg-4 col-md-4 col-sm-4 biv-gallery-section biv-gallery-section-1 all_images">
                                <div class="biv-gallery-item biv-photo-viewer-item" data-src="img/tours/full/01.jpg">
                                    <!--    -->

                                <?
                                    $tubeurl = "";
                                if(!empty($value['value'])){ 
                                $yid = explode('v=', $value['value'] ); 
                                if(!empty($yid[1])){
                                  $tubeurl= "https://www.youtube.com/embed/".$yid['1'];
                                }else{
                                  $tubeurl= "https://www.youtube.com/embed/".$value['value'];
                                } 
                              
                                } 
                           
                            
                            if($tubeurl!='')
                            {?>
                        
                        <span class="biv-background" >
                            <iframe style="height:100%;width:100%" src="<?=$tubeurl?>" frameborder="0" allowfullscreen></iframe>
                            </span>

                            <?}?>

                                    <!--  -->
                                </div>
                            </div>

                        <? } ?>



                    </div>
                </div>
            </div>
            <? if(count($gallary_images['data'])>7){ ?>
            <div class="col-12 text-center">
                <div id="load_more" onclick="load_more_videos()" class="biv-about-info-btn1 btn-type-1 btn-color-1 ">View More</a>
                </div>
            </div>
            <?}?>


        <? } else { ?>

            <div class="biv-blog m-5 p-5">
                <div class="biv-blog-content">
                    <div class="container">

                        <h1 class="text-center" style="color:#170c2b;text-transform:uppercase">Gallery Not Available</h1>
                        <h2 class="text-center mt-2" style="color:#170c2b">Please come back later.</h2>

                    </div>
                </div>
            </div>

        <? } ?>

        </div>
        <script src="lib/bxslider-4-4.2.12/dist/jquery.bxslider.min.js"></script>

        <script>
            $(document).ready(function() {



            })
        </script>

        <?

        include('footer.php');
        ?>