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
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$queryObject = new  Wp_Query( array(
    'post_type' => 'post',
    'category_name' => 'tintucseagame',
    'posts_per_page' => 5,
    'paged' => $paged

     
    ));?>

                <?php if ( $queryObject->have_posts() ) :

  
    while ( $queryObject->have_posts() ) :
        $queryObject->the_post(); ?>
                <article class="article row-article">
                    <div class="article-img">
                        <a href="#">
                            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
                <?php endwhile;?>

                <?php endif;?>
                <nav>
    <ul>
        <li><?php previous_posts_link( '&laquo; Trở về trang trước', $queryObject->max_num_pages) ?></li> 
        <li><?php next_posts_link( 'Trang tiếp theo &raquo;', $queryObject->max_num_pages) ?></li>
    </ul>
</nav>

            </div>

        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>