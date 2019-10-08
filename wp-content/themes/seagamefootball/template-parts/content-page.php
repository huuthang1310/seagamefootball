<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>
<div class="section">
	    <!-- CONTAINER -->
	    <div class="container">
	        <!-- ROW -->
	        <div class="row">
	            <!-- Main Column -->
	            <div class="col-md-8">

	                <!-- breadcrumb -->
	                <ul class="article-breadcrumb">
	                    <li><a href="#">Home</a></li>
	                    <li><a href="#">News</a></li>
	                    <li>Duis urbanitas eam in, tempor consequat.</li>
	                </ul>
	                <!-- /breadcrumb -->

	                <!-- ARTICLE POST -->
	                
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
	</header><!-- .entry-header -->

	<?php seagamefootball_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seagamefootball' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'seagamefootball' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="widget-tags">
	                    <ul>
	                        <li><a href="#">News</a></li>
	                        <li><a href="#">Sport</a></li>
	                        <li><a href="#">Lifestyle</a></li>
	                        <li><a href="#">Fashion</a></li>
	                        <li><a href="#">Music</a></li>
	                        <li><a href="#">Business</a></li>
	                    </ul>
	                </div>
	                <!-- /widget tags -->

	                <!-- article comments -->
	                <div class="article-comments">
	                    <div class="section-title">
	                        <h2 class="title">Comments</h2>
	                    </div>

	                    <!-- comment -->
	                    <div class="media">
	                        <div class="media-left">
	                            <img src="img/av-1.jpg" alt="">
	                        </div>
	                        <div class="media-body">
	                            <div class="media-heading">
	                                <h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
	                            </div>
	                            <p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec
	                                atqui paulo,</p>
	                            <a href="#" class="reply-btn">Reply</a>
	                        </div>

	                        <!-- comment -->
	                        <div class="media">
	                            <div class="media-left">
	                                <img src="img/av-2.jpg" alt="">
	                            </div>
	                            <div class="media-body">
	                                <div class="media-heading">
	                                    <h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
	                                </div>
	                                <p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne
	                                    nec atqui paulo,</p>
	                                <a href="#" class="reply-btn">Reply</a>
	                            </div>

	                            <!-- comment -->
	                            <div class="media">
	                                <div class="media-left">
	                                    <img src="img/av-1.jpg" alt="">
	                                </div>
	                                <div class="media-body">
	                                    <div class="media-heading">
	                                        <h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
	                                    </div>
	                                    <p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea.
	                                        Ne nec atqui paulo,</p>
	                                    <a href="#" class="reply-btn">Reply</a>
	                                </div>
	                            </div>
	                            <!-- /comment -->
	                        </div>
	                        <!-- /comment -->
	                    </div>
	                    <!-- /comment -->

	                    <!-- comment -->
	                    <div class="media">
	                        <div class="media-left">
	                            <img src="img/av-2.jpg" alt="">
	                        </div>
	                        <div class="media-body">
	                            <div class="media-heading">
	                                <h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
	                            </div>
	                            <p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec
	                                atqui paulo,</p>
	                            <a href="#" class="reply-btn">Reply</a>
	                        </div>
	                    </div>
	                    <!-- /comment -->
	                </div>
	                <!-- /article comments -->

	                <!-- reply form -->
	                <div class="article-reply-form">
	                    <div class="section-title">
	                        <h2 class="title">Leave a reply</h2>
	                    </div>

	                    <form>
	                        <input class="input" placeholder="Name" type="text">
	                        <input class="input" placeholder="Email" type="email">
	                        <input class="input" placeholder="Website" type="url">
	                        <textarea class="input" placeholder="Message"></textarea>
	                        <button class="input-btn">Send Message</button>
	                    </form>
	                </div>
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
    <?php get_footer(); ?>
