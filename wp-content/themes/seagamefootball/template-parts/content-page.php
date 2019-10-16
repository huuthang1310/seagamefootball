<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>
<?php $Url = get_template_directory_uri(); ?>
<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-8">

                <!-- breadcrumb -->

                <!-- /breadcrumb -->

                <!-- ARTICLE POST -->

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">

                    </header><!-- .entry-header -->

                    <?php seagamefootball_post_thumbnail(); ?>

                    <div class="entry-content">
                        <?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seagamefootball' ),
			'after'  => '</div>',
		) );
		?>
                    </div><!-- .entry-content -->


                </article><!-- #post-<?php the_ID(); ?> -->

                <!-- /widget tags -->

                <!-- article comments -->
                <br><br><br><?php 	if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
                <!-- /article comments -->

                <!-- reply form -->

                <!-- /reply form -->
            </div>
            <!-- /Main Column -->

            <!-- Aside Column -->
            <div class="col-md-4">
                <!-- Ad widget -->
                <div class="widget center-block hidden-xs">
                    <img class="center-block" src="<?php echo $Url ?>/img/300x250.gif" alt="">
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
                <div class="widget">
                    <div class="widget-title">
                        <h2 class="title">Bài viết khác</h2>
                    </div>

                    <!-- owl carousel 3 -->
                    <div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
                        <!-- ARTICLE -->
                         <?php
                            $currentID = get_the_ID();

$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
    'category_name' => 'tintucseagame'
    ));?>

<?php if ( $queryObject->have_posts() ) :
    $k = 0;
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 
        if ( $k <= 4 ) : 
            if($currentID != get_the_ID()) : ?>
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                              <h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <ul class="article-meta">
                                        <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?></li>
                                <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
                                </ul>
                            </div>
                        </article>
                         <?php endif; ?>
                          <?php endif; ?>
                        <?php $k++;?>
                        <?php endwhile;?>
                        <?php endif;?>
                     
                    <!-- /ARTICLE -->
                </div>
                <!-- /article widget -->

                <!-- article widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h2 class="title">Video</h2>
                    </div>

                    <!-- owl carousel 4 -->
                    <div id="owl-carousel-4" class="owl-carousel owl-theme">
                     <?php
                            $currentID = get_the_ID();

$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
   'category_name' => 'video'
    ));?>

<?php if ( $queryObject->have_posts() ) :
    $k = 0;
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 
        if ( $k <= 4 ) : 
            if($currentID != get_the_ID()) : ?>
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
                        <?php endif; ?>
                          <?php endif; ?>
                        <?php $k++;?>
                        <?php endwhile;?>
                        <?php endif;?>
                        <!-- /ARTICLE -->

                    </div>
                    <!-- /owl carousel 4 -->
                </div>
                <!-- /article widget -->
            </div>
            <!-- /Aside Column -->
            <!-- /Aside Column -->
        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<!-- /SECTION -->

<!-- AD SECTION -->
<div class="visible-lg visible-md">
    <img class="center-block" src="<?php echo $Url ?>/img/ad-3.jpg" alt="">
</div>
<!-- /AD SECTION -->


<!-- /SECTION -->