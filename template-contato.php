<?php

/**
 * Template Name: Contato
 */
get_header();
?>
<?php if (get_field('capa')) { ?>
    <section class="cover contato-cover" style="background-image: url(<?php echo get_field('capa') ?>)">
    </section>
<?php } ?>
<section class="contact_section_1">
    <div class="content">
        <h1 data-aos="fade-up"><?php echo get_field('titulo') ?></h1>
        <div data-aos="fade-up" data-aos-delay="300">
            <?php echo do_shortcode(pll_current_language() == 'en' ? '[contact-form-7 id="e2f1539" title="Contact"]' : '[contact-form-7 id="3f8dc4a" title="Contato"]') ?>
        </div>
    </div>
</section>
<section class="contact_section_2">
    <div class="location">
        <div class="address" data-aos="fade-right">
            <?php echo get_field('localizacao_endereco') ?>
        </div>
        <div class="map" data-aos="fade-left">
            <a href="<?php echo get_field('localizacao_link_mapa') ?>" target="_blank"><img src="<?php echo get_field('localizacao_mapa') ?>" alt=""></a>
        </div>
    </div>
    <div class="contact-info">
        <div data-aos="fade-up" data-aos-delay="200">
            <h3><?php echo pll_current_language() == 'en' ? 'Information' : 'Informações' ?></h3>
            <?php
            // Sempre mostrar widgets comuns
            if (is_active_sidebar('footer_common')) {
                dynamic_sidebar('footer_common');
            }
            ?>
            <div data-aos="fade-up" data-aos-delay="400">
                <p><i class="icon-envelope"></i> comercial@liga.com</p>
            </div>
        </div>

    </div>
</section>
<?php
get_footer();
?>
