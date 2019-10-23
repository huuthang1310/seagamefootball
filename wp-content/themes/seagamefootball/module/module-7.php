<?php $Url = get_template_directory_uri(); ?>
<div class="visible-lg visible-md">
    <img class="center-block ad ad2" data-src="<?php echo $Url ?>/img/970x250.gif" alt="">
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
                            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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