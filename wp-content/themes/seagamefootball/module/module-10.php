<div class="col-md-4">
    <!-- footer galery -->
    <div class="footer-widget galery-widget">
        <div class="widget-title">
            <h2 class="title">Những Hình Ảnh Mới</h2>
        </div>
        <ul>
            <?php
                            
$queryObject = new  Wp_Query( array(
    'post_type' => 'post'
    
    ));?>

            <?php if ( $queryObject->have_posts() ) :
    $k = 0;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $k <= 7  ) : ?>
            <li><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>"
                        alt="<?php the_title(); ?>"></a></li>
            <?php endif; ?>
            <?php $k++;?>
            <?php endwhile;?>
            <?php endif;?>
        </ul>
    </div>
    <!-- /footer galery -->
</div>
<!-- /Column 3 -->
</div>
<!-- /ROW -->