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

                    <div class="article-body">
                        <ul class="article-info">
                            <li class="article-category"><a href="#">Tin Tức</a></li>
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
            <?php get_template_part( 'module/module-15', 'silebar-right' ); ?>
        <!-- /CONTAINER -->
    </div>
    <!-- /SECTION -->

    <!-- AD SECTION -->
    <div class="visible-lg visible-md">
        <img class="center-block" src="<?php echo $Url ?>/img/ad-3.jpg" alt="">
    </div>
    <!-- /AD SECTION -->

    <!-- SECTION -->

    <!-- /SECTION -->
    <?php
get_footer();