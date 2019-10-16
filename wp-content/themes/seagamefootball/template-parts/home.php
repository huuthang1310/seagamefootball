<?php /* Template Name: home */ ?>
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
'post_type' => 'post',
'category_name' => 'tintucseagame'
); 
$post_query = new WP_Query($args);
if($post_query->have_posts()){
     $x = 0;
    while ($post_query->have_posts()){
        $post_query->the_post();
        if ( $x <= 3  ) : ?>
    <article class="article thumb-article">
        <div class="article-img">
            <img style="height: 505px" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
    <?php endif; ?>
    <?php $x++;?>
    <?php };?>
    <?php };?>

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
                            <?php
$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
     'category_name' => 'tintucseagame'
    ));?>

                            <?php if ( $queryObject->have_posts() ) :
    $i = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $i <= 3  ) : ?>
                            <!-- Column 1 -->
                            <div class="col-md-3 col-sm-6">
                                <!-- ARTICLE -->
                                <article class="article">
                                    <div class="article-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="<?php the_title(); ?>">
                                        </a>
                                        <ul class="article-info">
                                            <li class="article-type"><i class="fa fa-camera"></i></li>
                                        </ul>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <ul class="article-meta">
                                            <?php echo $rest = substr(get_the_excerpt(), 0, 120 ); ?>
                                            <span class="small">... <a href="<?php the_permalink(); ?>"><b>Xem
                                                        thêm</b></a><i class="text-muted"></i></span>
                                        </ul>


                                    </div>
                                </article>
                                <!-- /ARTICLE -->
                            </div>
                            <?php endif; ?>
                            <?php $i++;?>
                            <?php endwhile;?>
                            <?php endif;?>
                            <!-- /Column 1 -->


                            <!-- Column 4 -->
                        </div>
                        <!-- /row -->

                        <!-- row -->
                        <div class="row">
                            <!-- Column 1 -->
                            <?php if ( $queryObject->have_posts() ) :
              $n = 0;  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 
        if ( $n > 3  ) : ?>
                            <div class="col-md-4 col-sm-6">
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <ul class="article-meta">
                                            <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                            <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                        </ul>
                                    </div>
                                </article>
                                <!-- /ARTICLE -->


                            </div>
                            <?php endif; ?>
                            <?php $n++;?>
                            <?php endwhile;?>
                            <?php endif;?>
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

                        <?php
$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
     'category_name' => 'bongdavietnam'
    ));?>

                        <?php if ( $queryObject->have_posts() ) :
    $k = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $k < 1 ) : ?>
                        <article class="article">
                            <div class="article-img">
                                <a href="<?php the_permalink();?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                </ul>

                            </div>
                        </article>
                        <?php endif; ?>
                        <?php $k++;?>
                        <?php endwhile;?>
                        <?php endif;?>
                        <!-- /ARTICLE -->

                        <?php if ( $queryObject->have_posts() ) :
    $t = 2;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $t < 4  ) : ?>
                        <article class="article widget-article">
                            <div class="article-img">
                                <a href="<?php the_permalink();?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

                                </a>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                </ul>
                                <?php echo $rest = substr(get_the_excerpt(), 0, 120 ); ?>
                                <span class="small">... <a href="<?php the_permalink(); ?>"><b>Xem thêm</b></a><i
                                        class="text-muted"></i></span>
                            </div>
                        </article>
                        <?php endif; ?>
                        <?php $t++;?>
                        <?php endwhile;?>
                        <?php endif;?>

                    </div>
                    <!-- /Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- section title -->
                        <div class="section-title">
                            <h2 class="title">Bóng Đá Thế Giới</h2>
                        </div>
                        <?php
$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
     'category_name' => 'bongdathegioi'
    ));?>

                        <?php if ( $queryObject->have_posts() ) :
    $k = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $k < 1 ) : ?>
                        <article class="article">
                            <div class="article-img">
                                <a href="<?php the_permalink();?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                </ul>

                            </div>
                        </article>
                        <?php endif; ?>
                        <?php $k++;?>
                        <?php endwhile;?>
                        <?php endif;?>
                        <!-- /ARTICLE -->

                        <?php if ( $queryObject->have_posts() ) :
    $t = 1;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $t <= 2 ) : ?>
                        <article class="article widget-article">
                            <div class="article-img">
                                <a href="<?php the_permalink();?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

                                </a>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                </ul>
                                <?php echo $rest = substr(get_the_excerpt(), 0, 120 ); ?>
                                <span class="small">... <a href="<?php the_permalink(); ?>"><b>Xem thêm</b></a><i
                                        class="text-muted"></i></span>
                            </div>
                        </article>
                        <?php endif; ?>
                        <?php $t++;?>
                        <?php endwhile;?>
                        <?php endif;?>

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

                <!-- /social widget -->

                <!-- subscribe widget -->
                <div class="widget subscribe-widget">
                    <?php echo do_shortcode( '[email-subscribers-form id="1"]' ) ?>
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
                    <h2 class="title">Video Tổng Hợp</h2>
                    <div id="nav-carousel-2" class="custom-owl-nav pull-right"></div>
                </div>
                <!-- /section title -->

                <!-- owl carousel 2 -->
                <div id="owl-carousel-2" class="owl-carousel owl-theme">
                    <!-- ARTICLE -->
                    <?php
                            $post = get_post();
                             $args = array(
'post_type' => 'post',
'category_name' => 'video'
); 
$post_query = new WP_Query($args);
if($post_query->have_posts()){
	while($post_query->have_posts()){
		$post_query->the_post();
?>
                    <article class="article thumb-article" style="min-height: 210px;
    max-height: 210px;">
                        <div class="article-img">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="article-body">
                            <ul class="article-info">
                                <li class="article-category"><a href="<?php the_permalink(); ?>">Video</a></li>
                                <li class="article-type"><i class="fa fa-video-camera"></i></li>
                            </ul>
                            <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                            </ul>
                        </div>
                    </article>
                    <?php } } ?>
                    <!-- /ARTICLE -->

                    <!-- /ARTICLE -->
                </div>
                <!-- /owl carousel 2 -->
            </div>
            <!-- /Main Column -->
        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<?php
get_footer();