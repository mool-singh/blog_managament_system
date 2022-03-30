<?

include('header.php');

// get home banner
$filter = array(
    'table' => 'ci_banners',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '',
    'limit' => '1',
    'where' => 'is_active=1 AND id=7'
);
$bannerData = postData('listing', $filter);

if(!isset($_GET['p_id']) || $_GET['p_id']=='')
{
    header('location.index.php');
}
$p_id = strip_tags($_GET['p_id']);

// get package data

$filter = array(
    'table' => 'ci_tour_package',
    'sort' => 'id',
    'order' => 'asc',
    'start' => '',
    'limit' => '1',
    'where' => 'is_active=1 AND id='.$p_id
);
$packege_data = postData('listing', $filter);

if(!check_data_exist($packege_data))
{
    header('index.php');
}



?>

<!-- Content -->
    <div role="main" id="content">

<!-- Main screen -->
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

<!-- Form 1 -->
        <div class="biv-form">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="biv-form-info">
                            <div class="biv-form-info-title">
                                <h2 class="hp">Send inquiry for <?=$packege_data['data'][0]['title']?></h2>
                                
                            </div>
                        </div>

                        <div id="bivFormContentResult2"></div>
                        <div id="bivFormContent2">
                            <form id="in_form" action="send_inquiry.php" method="post">

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-input">
                                        <span>
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-input">
                                        <span>
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-input">
                                        <span>
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone">
                                        <input type="hidden" class="form-control" name="inquiry_mode" id="inquiry_mode" value='1'>
                                        <input type="hidden" class="form-control" name="tour_id" id="tour_id" value='<?=$packege_data['data'][0]['tour_cat_id']?>'>
                                        <input type="hidden" class="form-control" name="tour_package_id" id="tour_package_id" value='<?=$p_id?>'>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-input">
                                        <span>
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <input type="text" class="form-control" name="no_of_adult" id="no_of_adult" placeholder="Number of adults">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-input">
                                        <span>
                                            <i class="fas fa-child"></i>
                                        </span>
                                        <input type="text" class="form-control" name="no_of_child" id="no_of_child" placeholder="Number of child">
                                    </div>
                                </div>
                                
                                
                               
                                
                               

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="biv-form-textarea">
                                    <span>
                                        <i class="fas fa-comment"></i>
                                    </span>
                                    <textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                                    <div class="biv-form-agreement">
                                        <label>
                                            <span class="biv-form-agreement-btn"><input type="checkbox" name="agree" id="agree" value="1"></span>
                                           <span class="biv-form-agreement-text">I agree with the <a href="privacy-policy." rel="nofollow">terms of processing personal data</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="biv-form-btn">
                                        <span class="btn-type-1 btn-color-1" onclick="submit_form_in();">Get a Consultation</span>
                                    </div>
                                </div>
                            </div>
                            

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        

  <?include('footer.php')?>  

