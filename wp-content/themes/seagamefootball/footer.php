<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SeaGameFootball
 */

?>

</div><!-- #content -->
<?php $Url = get_template_directory_uri(); ?>
<footer id="footer">
    <!-- Top Footer -->
    <div id="top-footer" class="section">
        <!-- CONTAINER -->
        <div class="container">
            <!-- ROW -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4">
                    <!-- footer about -->
                    <div class="footer-widget about-widget">
                        <div class="footer-logo">
                            <a href="#" class="logo"><img src="<?php echo $Url ?>/img/logo-alt.png" alt=""></a>
                            <p>Website cung cấp tin tức bóng đá, lịch thi đấu, xếp hạng, và thông tin liên quan Seagame.</p>
                        </div>
                    </div>
                    <!-- /footer about -->

                    <!-- footer social -->
                    <div class="footer-widget social-widget">
                        <div class="widget-title">
                            <h3 class="title">Follow Us</h3>
                        </div>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
                
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            
                        </ul>
                    </div>
                    <!-- /footer social -->

                </div>
                <!-- /Column 1 -->

                <!-- Column 2 -->
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
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                <!-- /Column 2 -->

                <!-- Column 3 -->
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
                            <li><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a></li>
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
        </div>
        <!-- /CONTAINER -->
    </div>
    <!-- /Top Footer -->

    <!-- Bottom Footer -->
   
</footer>
<!-- /FOOTER -->

<!-- Back to top -->
<div id="back-to-top"></div>
</div><!-- #page -->
<script src="<?php echo $Url ?>/js/jquery.min.js"></script>
<script src="<?php echo $Url ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $Url ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $Url ?>/js/main.js"></script>
<script src="https://www.googletagservices.com/activeview/js/current/osd_listener.js?cache=r20110914"></script>

</body>

</html>