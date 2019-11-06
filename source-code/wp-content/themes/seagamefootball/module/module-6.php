<?php $Url = get_template_directory_uri(); ?>
<div class="col-md-4">
    <!-- Ad widget -->
    <div class="widget center-block hidden-xs">
        <img class="center-block" src="<?php echo $Url ?>/img/300x250.gif" alt="">
    </div>
    <div class="widget subscribe-widget">
        <?php echo do_shortcode( '[email-subscribers-form id="1"]' ) ?>
    </div>
</div>
</div>
</div>
</div>