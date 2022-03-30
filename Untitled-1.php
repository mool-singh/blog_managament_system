

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bivtemplate.site/html/itineribus-k19is01/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Jun 2021 09:50:41 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <!-- meta tags -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?= $meta_title; ?></title>
    <meta name="Keywords" content="<?= $meta_keyword; ?>">
    <meta name="Description" content="<?= $meta_description; ?>">
    <link rel="shortcut icon" href="<?= ADMIN_PATH . $general_settings['data']['favicon']; ?>" type="image/x-icon">



    <title>Home page</title>

    <link href="<?= ADMIN_PATH . $general_settings['data']['favicon']; ?>" rel="shortcut icon" />
    <link href="<?= ADMIN_PATH . $general_settings['data']['favicon']; ?>" rel="icon" type="image/x-icon" />

    <link href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div class="biv-contacts-top pl-lg-3 pr-lg-3">
        <div class="container-fluid">
            <div class="row">
                <? if (key_has_value($general_settings, 'tag_line')) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="biv-contacts-top-schedule"><i class="fas fa-clock"></i><span><?= $general_settings['data']['tag_line'] ?></span></div>
                    </div>
                <? } ?>


                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <? if (key_has_value($general_settings, 'first_phone')) { ?>
                        <div class="biv-contacts-top-phone">
                            <a href="tel:<?= $general_settings['data']['first_phone'] ?>"><i class="fas fa-phone-alt"></i><span><?= $general_settings['data']['first_phone'] ?></span></a>
                        </div>
                    <? } ?>
                    <? if (key_has_value($general_settings, 'first_email')) { ?>
                        <div class="biv-contacts-top-email">
                            <a href="mailto:<?= $general_settings['data']['first_email'] ?>"><i class="fas fa-envelope"></i><span><?= $general_settings['data']['first_email'] ?></span></a>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header id="header">
        <div class="container-fluid">
            <div class="biv-header">
                <div class="biv-header-content">
                    <div class="biv-header-logo">
                        <a href="index.php">
                            <img src="<?=ADMIN_PATH.$general_settings['data']['logo']; ?>" alt="Company name">
                            <!-- <span class="biv-header-logo-title">Company name</span> -->
                            <!-- <span class="biv-header-logo-desc">Itineribus template</span> -->
                        </a>
                    </div>
                    <div class="biv-header-btn">
                        <span onclick="BivNavBtn();">
                            <i class="fas fa-bars"></i>
                        </span>
                    </div>
                    <div class="biv-header-btns">
                        <a href="contact.php"> <span class="btn-type-1 btn-color-1"><i class="fas fa-mobile"></i> Contact</span></a>
                    </div>
                    <div class="biv-header-nav">
                        <ul class="biv-header-nav-items">

                        <li class="u" id="subMenu1">
                                <a href="index.php">Home</a>

                            </li>
                            <!-- show all tour categories -->

                            <?

                            if (check_data_exist(($categories))) {
                                foreach ($categories['data'] as $key => $value) {

                                    if($value['parent_id']!=0)
                                    {
                                        continue;
                                    }

                                    $id = $value['id'];

                                    // get child data

                                    $filter = array(
                                        'table' => 'ci_tour_categories',
                                        'sort' => 'sort_order',
                                        'order' => 'asc',
                                        'start' => '0',
                                        'limit' => '',
                                        'where' => 'is_active=1 AND parent_id=' . $id
                                    );


                                    $child_categories = postData('listing', $filter);
                                    

                                    if (check_data_exist($child_categories)) {?>


                                        <li class="biv-header-nav-submenu" id="subMenu<?=$key?>">
                                            <span onclick="BivNavBtnSubmenu('<?=$key?>');"><?=$value['name']?></span>
                                        
                                            <ul>

                                                <?foreach($child_categories['data'] as $key_child => $value_child){?>
                                                <li>
                                                    <a href="tour.php?location=<?=$value_child['slug']?>"><?=$value_child['name']?></a>
                                                </li>
                                                <?}?>
                                            
                                            </ul>
                                            
                                        </li>



                                   <? } else { ?>

                                        <li class="u" id="subMenu1">
                                            <a href="tour.php?location=<?=$value['slug']?>"><?=$value['name']?></a>

                                        </li>

                                    <? }
                                     }
                                      }





                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>









