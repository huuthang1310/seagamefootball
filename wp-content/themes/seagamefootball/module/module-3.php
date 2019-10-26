<!-- tin tức seagame -->

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
                            <div class="col-md-3 col-sm-3 col-lg-3">
                                <!-- ARTICLE -->
                                <article class="article">
                                    <div class="article-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>"
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
                                            <?php echo $rest = substr(get_the_excerpt(), 0, 100 ); ?>
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
                            <div class="col-md-6 col-sm-6">
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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