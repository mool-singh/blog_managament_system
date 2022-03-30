<?

include('header.php');

if (isset($_GET['location']) && $_GET['location'] == '') {
    echo("<script>location.href = 'index.php';</script>");
}

$slug = strip_tags($_GET['location']);

// get tour categories data

$filter = array(
    'table' => 'ci_tour_categories',
    'sort' => 'sort_order',
    'order' => 'asc',
    'start' => '0',
    'limit' => '1',
    'where' => "is_active=1 AND slug='" . $slug . "'"
);

$tour_id = '';
$tour_data = postData('listing', $filter);

if (!check_data_exist($tour_data)) {
    echo("<script>location.href = 'index.php';</script>");
}

$tour_id = $tour_data['data']['0']['id'];

// tour attractions

$filter = array(
    'table' => 'ci_tour_list',
    'sort' => 'id',
    'order' => 'asc',
    'start' => '',
    'limit' => '',
    'where' => "is_active=1 AND tour_cat_id=" . $tour_id
);


$tour_listing_data = postData('listing', $filter);

if (!check_data_exist($tour_listing_data)) {
    echo("<script>location.href = 'index.php';</script>");
}



// get tour packages
$filter = array(
    'table' => 'ci_tour_package',
    'sort' => 'id',
    'order' => 'asc',
    'start' => '',
    'limit' => '',
    'where' => "is_active=1 AND tour_cat_id=" . $tour_id
);


$tour_packages = postData('listing', $filter);



?>


<!-- Content -->
<div role="main" id="content">

    <!-- Page info -->
    <? if (check_data_exist($tour_data)) { ?>
        <div class="biv-page biv-background" data-src="<?= ADMIN_PATH . $tour_data['data'][0]['banner_image'] ?>">
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
                                            <span><?= $tour_data['data'][0]['name'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="biv-page-info-title">
                                    <h1><?= $tour_data['data'][0]['name'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>


    <!-- packages section -->

    <? if(check_data_exist($tour_packages)){ ?>
    <div class="biv-hot-tours">
            <div class="biv-hot-tours-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="biv-hot-tours-info">
                                <div class="biv-hot-tours-info-title">
                                    <h2>Packages</h2>
                                </div>
                                
                            </div>
                        </div>
             </div>
                    <div class="row">

                        <? foreach($tour_packages['data'] as $key => $value) {?>


                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-6">
                            <div class="biv-hot-tours-item" >
                                <div class="biv-hot-tours-item-info">
                                    <div class="biv-hot-tours-item-img biv-background-size" data-src="<?=ADMIN_PATH.$value['image']?>" style="background-image: url(&quot;<?=ADMIN_PATH.$value['image'];?>&quot;); height: 405px;"></div>
                                    <div class="biv-hot-tours-item-title">
                                        <h3><?=$value['title']?></h3>
                                        
                                    </div>
                                </div>
                                <div class="biv-hot-tours-item-btns">
                                    <div class="biv-hot-tours-item-price">
                                        <span><?=number_format($value['price'])?></span>
                                    </div>
                                    <div class="biv-hot-tours-item-url">
                                        <a href="inquiry.php?p_id=<?=$value['id']?>"><span>Send Inquiry</span></a>
                                    </div>
                                </div>
                                <div class="biv-hot-tours-item-desc"><?=$value['description']?></div>
                            </div>
                        </div>

                          
                        <?}?>

                       

                    </div>
                </div>
            </div>
     </div>

     <?}?>


        <!-- packages section -->


    <!-- About us -->
    <? if (check_data_exist($tour_listing_data)) { ?>
        <div class="biv-about">
            <div class="biv-about-content">
                <div class="container">

                    <div class="row">
                        <? foreach ($tour_listing_data['data'] as $key => $value) { ?>

                            <?

                            if ($key == 0) { ?>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-img">
                                        <span class="biv-background-size" data-src="<?= ADMIN_PATH . $value['image'] ?>"></span>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-info">
                                        <div class="biv-about-info-title mb-4">
                                            <h2><?= $value['tour_name'] ?></h2>
                                        </div>

                                        <div class="biv-about-info-text"><?= $value['description'] ?></div>

                                    </div>

                                </div>

                            <? } elseif ($key % 2 == 0) { ?>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-img">
                                        <span class="biv-background-size" data-src="<?= ADMIN_PATH . $value['image'] ?>"></span>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-info">
                                        <div class="biv-about-info-title mb-4">
                                            <h2><?= $value['tour_name'] ?></h2>
                                        </div>

                                        <div class="biv-about-info-text"><?= $value['description'] ?></div>

                                    </div>

                                </div>


                            <? } else { ?>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-info">
                                        <div class="biv-about-info-title mb-4">
                                            <h2><?= $value['tour_name'] ?></h2>
                                        </div>

                                        <div class="biv-about-info-text"><?= $value['description'] ?></div>

                                    </div>

                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="biv-about-img">
                                        <span class="biv-background-size" data-src="<?= ADMIN_PATH . $value['image'] ?>"></span>
                                    </div>
                                </div>




                            <? } ?>


                        <? } ?>
                    </div>



                </div>
            </div>
        </div>
    <? } ?>














</div>

<?php include('footer.php') ?>