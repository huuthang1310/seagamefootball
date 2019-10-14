	<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SeaGameFootball
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		 <a href="<?php the_permalink();?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
		
	</header><!-- .entry-header -->

	
</article><!-- #post-<?php the_ID(); ?> -->
