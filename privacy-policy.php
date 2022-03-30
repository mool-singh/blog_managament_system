<?

include('header.php');

// get home banner
$filter = array(
    'table'=>'ci_banners',
    'sort'=>'sort_order',
    'order'=>'asc',
    'start'=>'',
    'limit'=>'1',
    'where'=> 'is_active=1 AND id=8'
);  
$bannerData = postData('listing', $filter);

$privacy_section_data = getData('cms', 8);



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
                                    <h1><?=$bannerData['data'][0]['title_first']?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?}?> 

<!-- Elements -->
        
        <?

    if(check_data_exist($privacy_section_data))
    {
        echo $privacy_section_data['data']['cms_contant'];
    }

        ?>

    </div>

<? include('footer.php'); ?>