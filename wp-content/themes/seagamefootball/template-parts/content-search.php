	<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-12">
                <!-- section title -->
                <div class="section-title">
                  
                </div>
                <!-- /section title -->

                <!-- ARTICLE -->

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
              
            </div>

        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
	</header><!-- .entry-header -->

	
</article><!-- #post-<?php the_ID(); ?> -->
