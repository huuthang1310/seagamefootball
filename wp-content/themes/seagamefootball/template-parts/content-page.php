<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>
<?php $Url = get_template_directory_uri(); ?>
<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-8">

                <!-- breadcrumb -->

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


                </article><!-- #post-<?php the_ID(); ?> -->

                <!-- /widget tags -->

                <!-- article comments -->
                <br><br><br><?php 	if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
                <!-- /article comments -->

                <!-- reply form -->

                <!-- /reply form -->
            </div>
            <!-- /Main Column -->

            <!-- Aside Column -->
            <?php get_template_part( 'module/module-15', 'silebar-right' ); ?>
            <!-- /Aside Column -->
            <!-- /Aside Column -->
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


    <!-- /SECTION -->