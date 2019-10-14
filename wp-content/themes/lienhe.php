<?php 
get_header();
?>
<?php /* Template Name: Lien He */ ?>
<?php $Url = get_template_directory_uri(); ?>
<section id="contactForm">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div id="googleMap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d125417.70681699547!2d106.6259913364695!3d10.788063328556916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x31752f34e8598ab7%3A0x6eab948274b4cf43!2zOTAgTeG6oWMgxJDEqW5oIENoaSwgUC4gxJBha2FvLCBRLjEsIFRQLkhDTQ!3m2!1d10.7880712!2d106.6960319!5e0!3m2!1svi!2s!4v1493437832848"
                    width="100%" height="320" frameborder="0" style="border: 0px; pointer-events: none;"
                    allowfullscreen=""></iframe>
            </div>
            <div class="row margin-top-30">
                <div class="col-md-4">
                    <div class="logo" style="margin-bottom: 20px">
                        <img src="<?php echo $Url ?>/img/logo.jpg"
                            alt="Nhà hàng tiệc cưới Bách Việt đẹp và sang trọng - Quận 1">
                    </div>
                    <h4>TRUNG TÂM HỘI NGHỊ &amp; TIỆC CƯỚI BÁCH VIỆT</h4>
                    90 Mạc Đĩnh Chi, P. Đakao, Q.1, TP.HCM <br>

                    <a href="tel:02838273678">(028) 38 273 678</a> - <a href="tel:02838273678">38 275 375</a><br>
                    Email: info@bachviet.com.vn
                </div>
                <div class="col-md-8">
                    <?php echo do_shortcode('[contact-form-7 id="82" title="Contact form 1"]') ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
get_footer();