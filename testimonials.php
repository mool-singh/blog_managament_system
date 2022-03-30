<?

include('header.php');


// get home banner
$filter = array(
    'table'=>'ci_banners',
    'sort'=>'sort_order',
    'order'=>'asc',
    'start'=>'0',
    'limit'=>'1',
    'where'=> 'is_active=1 AND id=9'
);  
$bannerData = postData('listing', $filter);


// get home banner
$filter = array(
    'table'=>'ci_testimonials',
    'sort'=>'sort_order',
    'order'=>'asc',
    'start'=>'0',
    'limit'=>'',
    'where'=> 'is_active=1'
);  
$testimonials = postData('listing', $filter);





?>

<!-- Content -->
    <div role="main" id="content">

<!-- Page info -->
<?if(check_data_exist($bannerData)){?>
        <div class="biv-page biv-background" data-src="<?=ADMIN_PATH.$bannerData['data'][0]['image']?>">
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
                                            <span><?=$bannerData['data'][0]['title_first']?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="biv-page-info-title">
                                    <h1><?=$bannerData['data'][0]['title_second']?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?}?> 

<!-- Testimonials -->

        <? if(check_data_exist($testimonials)){ ?>

            <div class="biv-testimonials-s">
            <div class="biv-testimonials-s-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="biv-testimonials-s-info">
                                <div class="biv-testimonials-s-info-title">
                                    <h2>Testimonials </h2>
                                </div>
                                <div class="biv-testimonials-s-info-desc">What our clients are saying</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <? foreach($testimonials['data'] as $key => $value) {?>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="biv-testimonials-s-item">
                                <div class="biv-testimonials-s-item-img">
                                    <span class="biv-background" data-src="<?=ADMIN_PATH.$value['image']?>"></span>
                                </div>
                                <div class="biv-testimonials-s-item-name"><?=$value['name']?></div>
                                <div class="biv-testimonials-s-item-text"><?=$value['message']?></div>
                            </div>
                        </div>
                        
                        <?}?>
                      

                    </div>
                </div>
            </div>
        </div>

         
            
        <?}else{?>
            <div class="biv-blog m-5 p-5">
                <div class="biv-blog-content">
                    <div class="container">
                       
                    <h1 class="text-center" style="color:#170c2b;text-transform:uppercase">No Blogs Available</h1>
                    <h2 class="text-center mt-2" style="color:#170c2b">Please come later.</h2>

                    </div>
                </div>
            </div>

         <?}?>   

        
       

    </div>

    
    <?

include('footer.php');

    ?>

