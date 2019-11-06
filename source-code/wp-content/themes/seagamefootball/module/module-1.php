<!-- Menu -->

<?php $Url = get_template_directory_uri(); ?>
<header id="header">
    <!-- Top Header -->

    <!-- /Top Header -->

    <!-- Center Header -->
    <div id="center-header">
        <div class="container">
            <div class="header-logo">
                <a href="#" class="logo"><img data-src="<?php echo $Url ?>/img/images1.png" alt=""></a>

            </div>
            <div class="header-ads">
                <img class="center-block ad" src="<?php echo $Url ?>/img/fffff.gif" alt="">
            </div>
        </div>
    </div>
    <!-- /Center Header -->

    <!-- Nav Header -->
    <div id="nav-header">
        <div class="container">
            <nav id="main-nav">
                <div class="nav-logo">
                    <a href="#" class="logo"><img data-src="<?php echo $Url ?>/img/fffff.gif" alt=""></a>
                </div>
                <ul class="main-nav nav navbar-nav">
                <?php wp_nav_menu( array( 'li' => '%3$s' ) ); ?>
                  
                </ul>
            </nav>
            <div class="button-nav">
                <button class="search-collapse-btn"><i class="fa fa-search"></i></button>
                <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
                <div class="search-form">
                   <?php echo '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="Nhập từ khóa..." name="s" id="s" />
    <button type="submit" id="searchsubmit"  class="btn btn-primary">Tìm Kiếm</button>
    </form>' ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /Nav Header -->
</header>