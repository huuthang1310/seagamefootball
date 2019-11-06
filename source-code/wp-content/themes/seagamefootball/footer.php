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
                <?php get_template_part( 'module/module-8', 'top footer' ); ?>
                <?php get_template_part( 'module/module-9', 'binh luan nhieu nhat' ); ?>
                <?php get_template_part( 'module/module-10', 'nhung anh moi nhat' ); ?>
                <!-- /Top Footer -->
            </div>
            <!-- /CONTAINER -->
        </div>
        <!-- Bottom Footer -->
        <div id="bottom-footer" class="section">
            <!-- CONTAINER -->
            <div class="container">
                <!-- ROW -->
                <div class="row">
                    <!-- footer links -->
                    <?php get_template_part( 'module/module-11', 'Last footer' ); ?>
                    <!-- /footer copyright -->
                </div>
                <!-- /ROW -->
            </div>
            <!-- /CONTAINER -->
        </div>

        <?php get_template_part( 'module/module-12', 'modal 1' ); ?>
        <?php get_template_part( 'module/module-13', 'modal 2' ); ?>
</footer>
<!-- /FOOTER -->

<!-- Back to top -->
<div id="back-to-top"></div>
</div><!-- #page -->
<script src="<?php echo $Url ?>/js/jquery.min.js"></script>
<script src="<?php echo $Url ?>/js/lazyload.min.js"></script>
<script src="<?php echo $Url ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $Url ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $Url ?>/js/main.js"></script>
<script src="https://www.googletagservices.com/activeview/js/current/osd_listener.js?cache=r20110914"></script>

</body>

</html>