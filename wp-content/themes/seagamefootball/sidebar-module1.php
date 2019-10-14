<?php $Url = get_template_directory_uri(); ?>
<header id="header">
    <!-- Top Header -->

    <!-- /Top Header -->

    <!-- Center Header -->
    <div id="center-header">
        <div class="container">
            <div class="header-logo">
                <a href="#" class="logo"><img src="<?php echo $Url ?>/img/images1.png" alt=""></a>

            </div>
            <div class="header-ads">
                <img class="center-block" src="<?php echo $Url ?>/img/banner1.png" alt="">
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
                    <li class=""><a href="<?php echo get_site_url() ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo get_site_url() ?>/news">Tin Tức</a></li>
                    <li><a href="<?php echo get_site_url() ?>/tournament">Lịch Thi Đấu</a></li>
                    <li><a href="<?php echo get_site_url() ?>/tournament/teams">Đội bóng</a></li>
                    <li><a href="<?php echo get_site_url() ?>/tournament/groups">Xếp Hạng</a></li>
                    <li><a href="<?php echo get_site_url() ?>/tournament/stadiums">Sân vận động</a></li>
                    <li><a href="<?php echo get_site_url() ?>/video">Video</a></li>
                </ul>
            </nav>
            <div class="button-nav">
                <button class="search-collapse-btn"><i class="fa fa-search"></i></button>
                <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
                <div class="search-form">
                   <?php echo '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="Tìm kiếm..." name="s" id="s" />
    <button type="submit" id="searchsubmit"  class="btn btn-primary">Tìm Kiếm</button>
    </form>' ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Nav Header -->
</header>