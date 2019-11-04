<?php /* Template Name: home */ ?>
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('<?php echo get_site_url();?>/wp-content/themes/seagamefootball/sw.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}</script>
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
<?php get_template_part( 'module/module-2', 'slider' ); ?>
<?php get_template_part( 'module/module-3', 'tin tuc seagame' ); ?>
<?php get_template_part( 'module/module-4', 'bong da viet nam' ); ?>
<?php get_template_part( 'module/module-5', 'bong da the gioi' ); ?>
<?php get_template_part( 'module/module-6', 'sidebar-right' ); ?>
<?php get_template_part( 'module/module-7', 'video tong hop' ); ?>
<?php
get_footer();