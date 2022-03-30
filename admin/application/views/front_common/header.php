
<?php



?>
    <!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />

        <title><?=isset($title) ? $title : $this->general_settings['meta_description'] ?> </title>
    <meta name="Keywords" content="<?=$this->general_settings['meta_keyword']?>">
    <meta name="Description" content="<?=$this->general_settings['meta_description']?>">
    <link rel="shortcut icon" href="" type="image/x-icon">



    <title>Home page</title>

    <link href="<?php echo base_url().$this->general_settings['favicon']?>" rel="icon" type="image/x-icon" />


        <title>Starty - Multipurpose HTML5 Tamplate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <!-- Bootstrap -->
        <link href="<?= base_url()?>assets/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?= base_url()?>assets/dist/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/dist/css/line.css" rel="stylesheet" />
        <!-- Main Css -->
        <link href="<?= base_url()?>assets/dist/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="<?=base_url()?>">
                    
                    <img src="<?php echo base_url().$this->general_settings['logo']?>" width="100" height="50" alt="">
                </a>
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item search-icon mb-0">
                        <div class="dropdown">
                            <button type="button" class="btn btn-link text-decoration-none dropdown-toggle mb-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil uil-search h5 text-dark nav-light-icon-dark mb-0"></i>
                                <i class="uil uil-search h5 text-white nav-light-icon-white mb-0"></i>
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-4 py-0" style="width: 300px;">
                                <form class="p-4">
                                    <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-right nav-light">
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="index.php">Home</a><span class="menu-arrow"></span>
                        </li>

                        <li><a href="contact.php" class="sub-menu-item">Contact us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->