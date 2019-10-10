<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 
 * @package SeaGameFootball
 */

get_header();
?>
<?php /* Template Name: Video */ ?>
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
                    <h2 class="title">Trending Posts</h2>
                    <!-- tab nav -->
                    <ul class="tab-nav pull-right">
                        <li class="active"><a data-toggle="tab" href="#tab1">All</a></li>
                        <li><a data-toggle="tab" href="#tab1">News</a></li>
                        <li><a data-toggle="tab" href="#tab1">Sport</a></li>
                        <li><a data-toggle="tab" href="#tab1">Music</a></li>
                        <li><a data-toggle="tab" href="#tab1">Business</a></li>
                        <li><a data-toggle="tab" href="#tab1">Lifestyle</a></li>
                    </ul>
                    <!-- /tab nav -->
                </div>
                <!-- /section title -->

                <!-- Tab content -->
                <div class="tab-content">
                    <!-- tab1 -->
                    <div id="tab1" class="tab-pane fade in active">
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
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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

                        <!-- row -->
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-4 col-sm-6">
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img">
                                        <a href="#">
                                            <img src="<?php echo $Url ?>/img/img-widget-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                            <div class="col-md-4 col-sm-6">
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img">
                                        <a href="#">
                                            <img src="<?php echo $Url ?>/img/img-widget-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                            <img src="<?php echo $Url ?>/img/img-widget-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
                                        <ul class="article-meta">
                                            <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                            <li><i class="fa fa-comments"></i> 33</li>
                                        </ul>
                                    </div>
                                </article>
                                <!-- /ARTICLE -->
                            </div>
                            <!-- /Column 2 -->

                            <!-- /Column 3 -->
                            <div class="col-md-4 hidden-sm">
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img">
                                        <a href="#">
                                            <img src="<?php echo $Url ?>/img/img-widget-5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
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
                                            <img src="<?php echo $Url ?>/img/img-widget-6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="article-body">
                                        <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                consequat.</a></h4>
                                        <ul class="article-meta">
                                            <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                            <li><i class="fa fa-comments"></i> 33</li>
                                        </ul>
                                    </div>
                                </article>
                                <!-- /ARTICLE -->
                            </div>
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
                            <h2 class="title">News</h2>
                        </div>
                        <!-- /section title -->

                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-sm-1.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                                <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                    mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                    theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                            </div>
                        </article>
                        <!-- /ARTICLE -->

                        <!-- ARTICLE -->
                        <article class="article widget-article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-widget-7.jpg" alt="">
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
                                    <img src="<?php echo $Url ?>/img/img-widget-8.jpg" alt="">
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
                    <!-- /Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- section title -->
                        <div class="section-title">
                            <h2 class="title">Sport</h2>
                        </div>
                        <!-- /section title -->

                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-sm-2.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-file-text"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                                <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                    mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                    theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                            </div>
                        </article>
                        <!-- /ARTICLE -->

                        <!-- ARTICLE -->
                        <article class="article widget-article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-widget-9.jpg" alt="">
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
                                    <img src="<?php echo $Url ?>/img/img-widget-10.jpg" alt="">
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
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">News</h2>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Column 1 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-sm-3.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                                <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                    mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                    theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /Column 1 -->

                    <!-- /Column 2 -->
                    <div class="col-md-6 col-sm-6">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-sm-4.jpg" alt="">
                                </a>
                                <ul class="article-info">
                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                </ul>
                            </div>
                            <div class="article-body">
                                <h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
                                <ul class="article-meta">
                                    <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                    <li><i class="fa fa-comments"></i> 33</li>
                                </ul>
                                <p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing
                                    mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare
                                    theophrastus reprehendunt vel. Et commodo menandri eam.</p>
                            </div>
                        </article>
                        <!-- /ARTICLE -->
                    </div>
                    <!-- /Column 2 -->
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-1.jpg" alt="">
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
                    <!-- /Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- ARTICLE -->
                        <article class="article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="<?php echo $Url ?>/img/img-md-2.jpg" alt="">
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
                    <!-- /Column 2 -->

                    <!-- Column 3 -->
                    <div class="col-md-4 col-sm-4">
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
                </div>
                <!-- /row -->
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
                    <div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav owl-loaded owl-drag">
                        <!-- ARTICLE -->

                        <!-- /ARTICLE -->

                        <!-- ARTICLE -->

                        <!-- /ARTICLE -->
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-720px, 0px, 0px); transition: all 0.25s ease 0s; width: 2160px;">
                                <div class="owl-item cloned" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <div class="owl-item active" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <div class="owl-item" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 360px;">
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
                                            <h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor
                                                    consequat.</a></h4>
                                            <ul class="article-meta">
                                                <li><i class="fa fa-clock-o"></i> January 31, 2017</li>
                                                <li><i class="fa fa-comments"></i> 33</li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav">
                            <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="owl-dots disabled"></div>
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
            </div>
            <!-- /Aside Column -->
        </div>
        <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
</div>
<?php

get_footer();