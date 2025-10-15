<?php
/**
 * Template Name: Produtos
 */
  get_header();
?>
<section class="cover" style="background-image: url(<?php echo get_field('capa')?>)">
</section>
<section class="about_section_1">
    <div class="content">
      <h1 data-aos="fade-up"><?php echo get_field('titulo')?></h1>
      <p data-aos="fade-up" data-aos-delay="200"><?php echo nl2br(get_field('texto'))?></p>
    </div>
</section>
<section class="products_section_2">
    <div class="content">
        <div class="zero" data-aos="fade-right" data-aos-duration="1000">
          <p><?php echo get_field('texto_zero_clinquer')?></p>
          <div data-aos="zoom-in" data-aos-delay="300">
              <img src="<?php echo get_field('imagem_zero_clinquer')?>" alt="">
              <p><?php echo pll_current_language() == 'en' ? 'Zero Clinquer' : 'Zero Clínquer'?></p>
              <a href="<?php echo the_permalink(pll_current_language() == 'en' ? 32 : 15)?>" class="btn"><?php echo pll_current_language() == 'en' ? 'See more' : 'Saiba mais'?></a>
          </div>
      </div>
      <div class="all" data-aos="fade-left" data-aos-duration="1000">
          <p><?php echo get_field('texto_todos_produtos')?></p>
          <div data-aos="zoom-in" data-aos-delay="300">
              <img src="<?php echo get_field('imagem_todos')?>" alt="">
              <p><?php echo pll_current_language() == 'en' ? 'All Products' : 'Todos'?></p>
              <a href="<?php echo the_permalink(pll_current_language() == 'en' ? 30 : 19)?>" class="btn"><?php echo pll_current_language() == 'en' ? 'See more' : 'Saiba mais'?></a>
          </div>
        </div>
    </div>
</section>

<?php
  get_footer();
?>