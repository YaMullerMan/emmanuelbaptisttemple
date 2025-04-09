<?php get_header();
/* Template Name: CONTACT */  ?>

<div class="page-title-banner">
    <p class="page-width">Contact</p>
</div>

<section class="page-width">
    <div class="contact-container">
        <div class="contact-container__left">
            <?php the_content() ?>
            <hr width="100px" style="margin: 10px 0; min-width: 100px">
            <p><b>301-582-0378</b></p>
            <p><b>office@ebt.church</b></p>
            <p><b>16221 National Pike<br>Hagerstown, MD 21740</b></p>
        </div>
        <div class="contact-container__right">
            <div class="contact__form">
                <?php echo do_shortcode('[wpforms id="185"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>