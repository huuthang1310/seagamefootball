<div class="col-md-4">
    <!-- footer article -->
    <div class="footer-widget">
        <div class="widget-title">
            <h2 class="title">Bình Luận Nhiều Nhất</h2>
        </div>

        <!-- ARTICLE -->
        <?php
                            
$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
     'orderby' => 'comment_count'
    ));?>

        <?php if ( $queryObject->have_posts() ) :
    $k = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $k <= 3  ) : ?>
        <article class="article widget-article">
            <div class="article-img">
                <a href="#">
                    <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </a>
            </div>
            <div class="article-body">
                <h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
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
    </div>
    <!-- /footer article -->
</div>