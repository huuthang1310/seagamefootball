<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SeaGameFootball
 */

?>
<?php $Url = get_template_directory_uri(); ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header">
        <!-- Top Header -->
        <div id="top-header">
            <div class="container">
                <div class="header-links">
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Advertisement</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
                    </ul>
                </div>
                <div class="header-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Top Header -->

        <!-- Center Header -->
        <div id="center-header">
            <div class="container">
                <div class="header-logo">
                    <a href="#" class="logo"><img src="<?php echo $Url ?>/img/logo.png" alt=""></a>
                </div>
                <div class="header-ads">
                    <img class="center-block" src="<?php echo $Url ?>/img/ad-2.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /Center Header -->

        <!-- Nav Header -->
        <div id="nav-header">
            <div class="container">
                <nav id="main-nav">
                    <div class="nav-logo">
                        <a href="#" class="logo"><img src="<?php echo $Url ?>/img/logo-alt.png" alt=""></a>
                    </div>
                    <ul class="main-nav nav navbar-nav">
                        <li class="active"><a href="#">Trang Chủ</a></li>
                        <li><a href="<?php echo get_site_url() ?>/news">Tin Tức</a></li>
                        <li><a href="<?php echo get_site_url() ?>/tournament">Lịch Thi Đấu</a></li>
                        <li><a href="<?php echo get_site_url() ?>/tournament/teams">Đội bóng</a></li>
                        <li><a href="<?php echo get_site_url() ?>/tournament/groups">Xếp Hạng</a></li>
                        <li><a href="<?php echo get_site_url() ?>/tournament/stadiums">Sân vận động</a></li>
                        <li><a href="#">Video</a></li>
                    </ul>
                </nav>
                <div class="button-nav">
                    <button class="search-collapse-btn"><i class="fa fa-search"></i></button>
                    <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
                    <div class="search-form">
                        <form>
                            <input class="input" type="text" name="search" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Nav Header -->
    </header>