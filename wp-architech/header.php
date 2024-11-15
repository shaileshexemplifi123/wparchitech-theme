<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Contra - Interior Creator HTML Template | Home Page 01</title>
<!-- Stylesheets -->

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<?php wp_head(); ?>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!-- Main Header-->
    <header class="main-header header-style-one">
        <div class="auto-container">
            <div class="header-lower">
                <div class="main-box clearfix">
                    <?php  $header_logo = get_field("header_logo", "option"); 
                        $logo_url = wp_get_attachment_image_src($header_logo, 'full');
                        if (!empty($logo_url)){
                        ?>
                    <div class="logo-box">
                        <div class="logo"><a href="index-2.html"><img src="<?php echo $logo_url[0]; ?>" alt="" title=""></a></div>
                    </div>
                        <?php } ?>
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md ">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon flaticon-menu-button"></span>
                                </button>
                            </div>
                            
                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                <?php 
                                    wp_nav_menu( array(
                                       'container' => false,
                                       'menu' => 'menu-1',
                                       'menu_class'=> 'navigation'
                                    ) );
                                ?>
                         
                            </div>
                        </nav><!-- Main Menu End-->                        

                        <!-- Outer Box-->
                        <div class="outer-box">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="#">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--End Main Header -->