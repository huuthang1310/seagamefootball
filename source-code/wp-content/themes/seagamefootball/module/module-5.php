<!-- Bong Da The Gioi -->

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
        <div class="article-img aing">
            <a href="<?php the_permalink();?>">
                <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
            <ul class="article-info">
                <li class="article-type"><i class="fa fa-camera"></i></li>
            </ul>
        </div>
        <div class="article-body">
            <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>


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
                <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

            </a>
        </div>
        <div class="article-body">
            <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <br>
            <p><?php echo $rest = substr(get_the_excerpt(), 0, 120 ); ?></p>
            <span class="small"><a href="<?php the_permalink(); ?>"><b>Xem thêm</b></a><i class="text-muted"></i></span>
        </div>
    </article>
    <?php endif; ?>
    <?php $t++;?>
    <?php endwhile;?>
    <?php endif;?>

</div>
</div>
</div>