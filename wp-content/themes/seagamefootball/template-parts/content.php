<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>
<?php $Url = get_template_directory_uri(); ?>
<!-- SECTION -->
<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-8">

                <!-- breadcrumb -->
                <ul class="article-breadcrumb">
                    <li><a href="<?php echo get_site_url() ?>">Home</a></li>
                    <li><a href="<?php echo get_site_url() ?>/news">Tin Tức</a></li>
                    <li><?php the_title( ) ?></li>
                </ul>
                <!-- /breadcrumb -->

                <!-- ARTICLE POST -->
                <article class="article article-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="article-share">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>

                    
                    <div class="article-body">
                        <ul class="article-info">
                            <li class="article-category"><a href="#">News</a></li>
                            <li class="article-type"><i class="fa fa-file-text"></i></li>
                        </ul>
                        <h1 class="article-title"><?php the_title( ) ?></h1>
                        <ul class="article-meta">
                            <li><i class="fa fa-clock-o"></i><?php seagamefootball_posted_on(); ?></li>
                            <li><i class="fa fa-comments"></i> <?php echo get_comments_number(  ) ?></li>
                        </ul>
                        <p><?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'seagamefootball' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seagamefootball' ),
			'after'  => '</div>',
		) );
		?></p>

                </article>
                <!-- /ARTICLE POST -->

                <!-- widget tags -->
               
                <!-- /widget tags -->

                <!-- article comments -->
                <?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
                <!-- /article comments -->

                <!-- reply form -->
                
                <!-- /reply form -->
            </div>
            <!-- /Main Column -->

            <!-- Aside Column -->
            <div class="col-md-4">
                <!-- Ad widget -->
                <div class="widget center-block hidden-xs">
                    <img class="center-block" src="<?php echo $Url ?>/img/ad-1.jpg" alt="">
                </div>
                <!-- /Ad widget -->

                <!-- social widget -->
                <div class="widget social-widget">
                    <div class="widget-title">
                        <h2 class="title">Stay Connected</h2>
                    </div>
                    <ul>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a>
                        </li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a>
                        </li>
                        <li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
                    </ul>
                </div>
                <!-- /social widget -->

                <!-- subscribe widget -->
                <div class="widget subscribe-widget">
                    <div class="widget-title">
                        <h2 class="title">Subscribe to Newslatter</h2>
                    </div>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="input-btn">Subscribe</button>
                    </form>
                </div>
                <!-- /subscribe widget -->

                <!-- article widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h2 class="title">Most Read</h2>
                    </div>

                    <!-- owl carousel 3 -->
                    <div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-3.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->

                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-4.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /owl carousel 3 -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->

                    <!-- ARTICLE -->
                    <article class="article widget-article">
                        <div class="article-img">
                            <a href="#">
                                <img src="<?php echo $Url ?>/img/img-widget-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-body">
                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                            <ul class="article-meta">
                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                <li><i class="fa fa-comments"></i> 33</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /ARTICLE -->
                </div>
                <!-- /article widget -->

                <!-- article widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h2 class="title">Featured Posts</h2>
                    </div>

                    <!-- owl carousel 4 -->
                    <div id="owl-carousel-4" class="owl-carousel owl-theme">
                        <!-- ARTICLE -->
                        <article class="article thumb-article">
                            <div class="article-img">
                                <img src="<?php echo $Url ?>/img/img-thumb-1.jpg" alt="">
                            </div>
                            <div class="article-body">
                                <ul class="article-info">
                                    <li class="article-category"><a href="#">News</a></li>
                                    <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                </ul>
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->

                        <!-- ARTICLE -->
                        <article class="article thumb-article">
                            <div class="article-img">
                                <img src="<?php echo $Url ?>/img/img-thumb-2.jpg" alt="">
                            </div>
                            <div class="article-body">
                                <ul class="article-info">
                                    <li class="article-category"><a href="#">News</a></li>
                                    <li class="article-type"><i class="fa fa-video-camera"></i></li>
                                </ul>
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /owl carousel 4 -->
                </div>
                <!-- /article widget -->
            </div>
            <!-- /Aside Column -->
        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<!-- /SECTION -->

<!-- AD SECTION -->
<div class="visible-lg visible-md">
    <img class="center-block" src="<?php echo $Url ?>/img/ad-3.jpg" alt="">
</div>
<!-- /AD SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-12">
                <!-- section title -->
                <div class="section-title">
                    <h2 class="title">Related Post</h2>
                </div>
                <!-- /section title -->

                <!-- row -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-1.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /Column 2 -->

                    <!-- Column 3 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-3.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /Column 3 -->

                    <!-- Column 4 -->
                    <div class="col-md-3 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-4.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- Column 4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /Main Column -->
        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<!-- /SECTION -->
<?php
get_footer();
