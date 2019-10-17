<!-- Slider -->

<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">

    <?php $args = array(
'post_type' => 'post',
'category_name' => 'tintucseagame'
); 
$post_query = new WP_Query($args);
if($post_query->have_posts()){
     $x = 0;
    while ($post_query->have_posts()){
        $post_query->the_post();
        if ( $x <= 3  ) : ?>
    <article class="article thumb-article">
        <div class="article-img">
            <img style="height: 505px" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="article-body">
            <ul class="article-info">
                <li class="article-category"><a href="#">Tin Tức</a></li>
                <li class="article-type"><i class="fa fa-file-text"></i></li>
            </ul>
            <h2 class="article-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <ul class="article-meta">
                <li><i class="fa fa-clock-o"></i> <?php the_time('F jS, Y'); ?> </li>
                <li><i class="fa fa-comments"></i> <?php echo get_comments_number();?></li>
            </ul>
        </div>
    </article>
    <!-- /ARTICLE -->
    <?php endif; ?>
    <?php $x++;?>
    <?php };?>
    <?php };?>

</div>