<!-- Bong Da Viet Nam -->

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
    $t = 2;
  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); 

        if ( $t < 4  ) : ?>
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
                                <span class="small"><a href="<?php the_permalink(); ?>"><b>Xem thêm</b></a><i
                                        class="text-muted"></i></span>
                            </div>
                        </article>
                        <?php endif; ?>
                        <?php $t++;?>
                        <?php endwhile;?>
                        <?php endif;?>

                    </div>