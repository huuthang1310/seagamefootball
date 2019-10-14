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
                            <p>Website cung cấp tin tức bóng đá, lịch thi đấu, xếp hạng, và thông tin liên quan Seagame.
                            </p>
                        </div>
                    </div>
                    <!-- /footer about -->

                    <!-- footer social -->
                    <div class="footer-widget social-widget">
                        <div class="widget-title">
                            <h3 class="title">Theo Dõi Tại</h3>
                        </div>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
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
                            <li><a href="<?php the_permalink(); ?>"><img
                                        src="<?php echo get_the_post_thumbnail_url(); ?>"
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
        </div>
        <!-- /CONTAINER -->
    </div>
    <!-- /Top Footer -->

    <!-- Bottom Footer -->
    <div id="bottom-footer" class="section">
        <!-- CONTAINER -->
        <div class="container">
            <!-- ROW -->
            <div class="row">
                <!-- footer links -->
                <div class="col-md-6 col-md-push-6">
                    <ul class="footer-links">
                        <li><a data-toggle="modal" href="#myModal1">Thông Tin</a></li>
                        <li><a data-toggle="modal" href="#myModal2">Góp Ý</a></li>
                    </ul>
                </div>
                <!-- /footer links -->

                <!-- footer copyright -->
                <div class="col-md-6 col-md-pull-6">
                    <div class="footer-copyright">
                        <span>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Bản Quyền &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> Nhóm B - Chuyên đề web 2 <i class="fa fa-heart-o" aria-hidden="true"></i><a> TDC
                            </a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
                <!-- /footer copyright -->
            </div>
            <!-- /ROW -->
        </div>
        <!-- /CONTAINER -->
    </div>


    <!-- Modal -->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông Tin Nhóm</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nhóm B Chuyên Đề Phát Triển Web 2</p>
                            <p> + Bùi Hửu Thắng</p>
                            <p> + Nguyễn Hãi Phúc Khang</p>
                            <p> + Nguyễn Minh Trinh</p>
                            <p> + Đoàn Vũ Quốc Khiêm</p>
                        </div>
                        <div class="col-md-6">
                            <p>Giáo Viên Hướng Dẫn
                            </p>
                            <p>+ Thầy Phan Thanh Nhuần</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="width : 70px;" class="img-responsive"
                                        src="<?php echo $Url ?>/img/Logo-Cao-dang1.jpg">
                                </div>
                                <div class="col-md-8">
                                    <p>Trường Cao Đẳng Công Nghệ Thủ Đức</p>
                                    <p>Địa chỉ : 53 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Hồ Chí Minh</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Góp Ý Của Đọc Giả</h4>
                </div>
                
                <div class="modal-body">
                   <?php echo do_shortcode('[contact-form-7 id="85" title="Untitled"]') ?>
                </div>
               
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

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