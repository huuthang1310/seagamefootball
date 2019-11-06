<style type="text/css">
.ig_es_offer{
    width: 70%;
    margin: 0 auto;
    text-align: center;
    padding-top: 1.2em;
}
.ig_es_offer img{
	width: 100%;
}
</style>
<?php 
if(  (get_option('ig_es_offer_halloween_done_2019') !== 'yes') && ($ig_current_date >= strtotime("2019-10-23")) && ($ig_current_date <= strtotime("2019-10-30")) ) { ?>
	<div class="ig_es_offer">
	    <a target="_blank" href="?es_dismiss_admin_notice=1&option_name=offer_halloween_done_2019"><img src="<?php echo EMAIL_SUBSCRIBERS_URL ?>/admin/images/29-30.png"  /></a>
	</div>

<?php } 
if( (get_option('ig_es_offer_last_day_halloween_done_2019') !== 'yes') &&  ($ig_current_date >= strtotime("2019-10-31")) && ($ig_current_date <= strtotime("2019-11-1")) ) { ?>
	<div class="ig_es_offer">
	    <a target="_blank" href="?es_dismiss_admin_notice=1&option_name=offer_last_day_halloween_done_2019"><img src="<?php echo EMAIL_SUBSCRIBERS_URL ?>/admin/images/31-1.png"  /></a>
	</div>

<?php } ?>