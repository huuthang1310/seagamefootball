    <?php
    /**
    * The main template file
    *
    * This is the most generic template file in a WordPress theme
    * and one of the two required files for a theme (the other being style.css).
    * It is used to display a page when nothing more specific matches a query.
    * E.g., it puts together the home page when no home.php file exists.
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

    * @package SeaGameFootball
    */

    get_header();
    ?>
    <?php $Url = get_template_directory_uri(); ?>
    <div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
        <!-- ARTICLE -->
        <?php $args = array(
    'post_type' => 'post'
    ); 
    $post_query = new WP_Query($args);
    if($post_query->have_posts()){
    while($post_query->have_posts()){
    $post_query->the_post(); ?>
        <article class="article thumb-article">
            <div class="article-img">
                <img style="height: 505px" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="img thumbnail">
            </div>
            <div class="article-body">
                <ul class="article-info">
                    <li class="article-category"><a href="#">Tin Tức</a></li>
                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                </ul>
                <h2 class="article-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <ul class="article-meta">
                    <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?> </li>
                    <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                </ul>
            </div>
        </article>
        <!-- /ARTICLE -->
            <?php } 
                } ?>
                           
        <!-- /ARTICLE -->
    </div>
    <div class="section">
    <!-- CONTAINER -->
    <div class="container">
    <!-- ROW -->
    <div class="row">
        <!-- Main Column -->
        <div class="col-md-12">
            <!-- section title -->
            <div class="section-title">
                <h2 class="title">Tin Tức Seagame</h2>
                <!-- tab nav -->
                
                <!-- /tab nav -->
            </div>
            <!-- /section title -->

            <!-- Tab content -->
            <div class="tab-content">
                <!-- tab1 -->
                <div id="tab1" class="tab-pane fade in active">
                    <!-- row -->
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-3 col-sm-6">
                            <!-- ARTICLE -->
                            <article  ticle class="article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-md-1.jpg" alt="">
                                    </a>
                                    <ul class="article-info">
                                        <li class="article-type"><i class="fa fa-camera"></i></li>
                                    </ul>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 1 -->

                        <!-- Column 2 -->
                        <div class="col-md-3 col-sm-6">
                            <!-- ARTICLE -->
                            <article class="article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-md-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 2 -->

                        <!-- Column 3 -->
                        <div class="col-md-3 col-sm-6">
                            <!-- ARTICLE -->
                            <article class="article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-md-3.jpg" alt="">
                                    </a>
                                    <ul class="article-info">
                                        <li class="article-type"><i class="fa fa-file-text"></i></li>
                                    </ul>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 3 -->

                        <!-- Column 4 -->
                        <div class="col-md-3 col-sm-6">
                            <!-- ARTICLE -->
                            <article class="article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-md-4.jpg" alt="">
                                    </a>
                                    <ul class="article-info">
                                        <li class="article-type"><i class="fa fa-file-text"></i></li>
                                    </ul>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- Column 4 -->
                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-4 col-sm-6">
                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->

                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 1 -->

                        <!-- Column 2 -->
                        <div class="col-md-4 col-sm-6">
                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->

                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 2 -->

                        <!-- /Column 3 -->
                        <div class="col-md-4 hidden-sm">
                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->

                            <!-- ARTICLE -->
                            <article class="article widget-article">
                                <div class="article-img">
                                    <a href="#">
                                        <img src="<?php echo $Url ?>/img/img-widget-6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="article-body">
                                    <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h4>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /ARTICLE -->
                        </div>
                        <!-- /Column 3 -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /tab1 -->
            </div>
            <!-- /tab content -->
        </div>
        <!-- /Main Column -->
    </div>
    <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
    </div>
    <div class="section">
    <!-- CONTAINER -->
    <div class="container">
    <!-- ROW -->
    <div class="row">
        <!-- Main Column -->
        <div class="col-md-8">
            <!-- row -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6 col-sm-6">
                    <!-- section title -->
                    <div class="section-title">
                        <h2 class="title">Bóng Đá Việt Nam</h2>
                    </div>
                    <!-- /section title -->

                    <!-- ARTICLE -->
                    <article class="article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-sm-1.jpg" alt="">
                            </a>
                            <ul class="article-info">
                                <li class="article-type"><i class="fa fa-camera"></i></li>
                            </ul>
                        </div>
                        <div class="article-body">
                            <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                            <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-7.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-8.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->
                </div>
                <!-- /Column 1 -->

                <!-- Column 2 -->
                <div class="col-md-6 col-sm-6">
                    <!-- section title -->
                    <div class="section-title">
                        <h2 class="title">Bóng Đá Thế Giới</h2>
                    </div>
                    <!-- /section title -->

                    <!-- ARTICLE -->
                    <article class="article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-sm-2.jpg" alt="">
                            </a>
                            <ul class="article-info">
                                <li class="article-type"><i class="fa fa-file-text"></i></li>
                            </ul>
                        </div>
                        <div class="article-body">
                            <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                            <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-9.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-10.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->
                </div>
                <!-- /Column 2 -->
            </div>
            <!-- /row -->

            <!-- row -->

            <!-- /row -->

            <!-- row -->
            
            <!-- /row -->
        </div>
        <!-- /Main Column -->

        <!-- Aside Column -->
        <div class="col-md-4">
            <!-- Ad widget -->
            <div class="widget center-block hidden-xs">
                <img class="center-block" src="<?php echo $Url ?>/img/ad-1.jpg" alt="">
            </div>
            <!-- /Ad widget -->

            <!-- social widget -->
            <div class="widget social-widget">
                <div class="widget-title">
                    <h2 class="title">Stay Connected</h2>
                </div>
                <ul>
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a>
                    </li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a>
                    </li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
                    <li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
                </ul>
            </div>
            <!-- /social widget -->

            <!-- subscribe widget -->
            <div class="widget subscribe-widget">
                <div class="widget-title">
                    <h2 class="title">Subscribe to Newslatter</h2>
                </div>
                <form>
                    <input class="input" type="email" placeholder="Enter Your Email">
                    <button class="input-btn">Subscribe</button>
                </form>
            </div>
            <!-- /subscribe widget -->

            <!-- article widget -->
           
            <!-- /article widget -->
        </div>
        <!-- /Aside Column -->
    </div>
    <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
    </div>
    <div class="visible-lg visible-md">
    <img class="center-block" src="<?php echo $Url ?>/img/ad-3.jpg" alt="">
    </div>
    <div class="section">
    <!-- CONTAINER -->
    <div class="container">
    <!-- ROW -->
    <div class="row">
        <!-- Main Column -->
        <div class="col-md-12">
            <!-- section title -->
            <div class="section-title">
                <h2 class="title">Video Bóng Đá</h2>
                <div id="nav-carousel-2" class="custom-owl-nav pull-right">
                    <div class="owl-prev disabled"><i class="fa fa-angle-left"></i></div>
                    <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
            <!-- /section title -->

            <!-- owl carousel 2 -->
            <div id="owl-carousel-2" class="owl-carousel owl-theme owl-loaded owl-drag">
                <!-- ARTICLE -->

                <!-- /ARTICLE -->

                <!-- ARTICLE -->

                <!-- /ARTICLE -->

                <!-- ARTICLE -->

                <!-- /ARTICLE -->

                <!-- ARTICLE -->

                <!-- /ARTICLE -->
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1540px;">
                        <div class="owl-item active" style="width: 370px; margin-right: 15px;">
                            <article class="article thumb-article">
                                <div class="article-img">
                                    <img src="<?php echo $Url ?>/img/img-thumb-1.jpg" alt="">
                                </div>
                                <div class="article-body">
                                    <ul class="article-info">
                                        <li class="article-category"><a href="#">News</a></li>
                                        <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                    </ul>
                                    <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h3>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="owl-item active" style="width: 370px; margin-right: 15px;">
                            <article class="article thumb-article">
                                <div class="article-img">
                                    <img src="<?php echo $Url ?>/img/img-thumb-2.jpg" alt="">
                                </div>
                                <div class="article-body">
                                    <ul class="article-info">
                                        <li class="article-category"><a href="#">News</a></li>
                                        <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                    </ul>
                                    <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h3>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="owl-item active" style="width: 370px; margin-right: 15px;">
                            <article class="article thumb-article">
                                <div class="article-img">
                                    <img src="<?php echo $Url ?>/img/img-thumb-3.jpg" alt="">
                                </div>
                                <div class="article-body">
                                    <ul class="article-info">
                                        <li class="article-category"><a href="#">News</a></li>
                                        <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                    </ul>
                                    <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h3>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="owl-item" style="width: 370px; margin-right: 15px;">
                            <article class="article thumb-article">
                                <div class="article-img">
                                    <img src="<?php echo $Url ?>/img/img-thumb-4.jpg" alt="">
                                </div>
                                <div class="article-body">
                                    <ul class="article-info">
                                        <li class="article-category"><a href="#">News</a></li>
                                        <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                    </ul>
                                    <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                            consequat.</a></h3>
                                    <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                        <li><i class="fa fa-comments"></i> 33</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="owl-dots disabled"></div>
            </div>
            <!-- /owl carousel 2 -->
        </div>
        <!-- /Main Column -->
    </div>
    <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
    </div>
    <div class="section">
    <!-- CONTAINER -->
    <div class="container">
    <!-- ROW -->
    <div class="row">
        <!-- Main Column -->
        <div class="col-md-12">
            <!-- section title -->
            <div class="section-title">
                <h2 class="title">Tin Tổng Hợp</h2>
            </div>
            <!-- /section title -->

            <!-- ARTICLE -->
            <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
    'post_type' => 'post',
    'paged'          => $paged,
    'posts_per_page' => 2
    ); 
    $post_query = new WP_Query($args);
    if($post_query->have_posts()){

    while($post_query->have_posts()){
    $post_query->the_post(); ?>
            <article class="article row-article">
                <div class="article-img">
                    <a href="#">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    </a>
                </div>
                <div class="article-body">
                    <ul class="article-info">
                        <li class="article-category"><a href="#">Tin Tức</a></li>
                        <li class="article-type"><i class="fa fa-file-text"></i></li>
                    </ul>
                    <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <ul class="article-meta">
                        <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                        <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                    </ul>
                  
                </div>
            </article>

        <?php } ?>

             <?php } ?>
            <!-- /pagination -->
    </div>
        <!-- /Main Column -->

        <!-- Aside Column -->
      
        <!-- /Aside Column -->
    </div>
    <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
    </div>
    <?php
//aaa
    get_footer();