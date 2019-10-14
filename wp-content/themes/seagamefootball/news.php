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
<?php /* Template Name: News */ ?>
<?php $Url = get_template_directory_uri(); ?>
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
                <?php
$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
    'category_name' => 'tintucseagame'
     
    ));?>

                <?php if ( $queryObject->have_posts() ) :
    $m = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $m <= 10  ) : ?>
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
                        <?php echo $rest = substr(get_the_excerpt(), 0, 400 ); ?>
                        <a href="<?php the_permalink(); ?>"><b>Xem thêm</b></a>
                    </div>
                </article>
                <?php endif; ?>
                <?php $m++;?>
                <?php endwhile;?>
                <?php endif;?>
            </div>

        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<?php

get_footer();