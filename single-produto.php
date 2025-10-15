<?php
  get_header();
?>
<section class="product-cover" data-aos="fade-up" style="background-image: url(<?php echo get_field('capa')?>)">
</section>
<section class="product_section_1 <?php $currentCat = pll_current_language() == 'en' ? 'zero-clinquer' : 'zero-clinquer-pt';
echo has_term( $currentCat, 'cat_produtos' ) ? 'zero-clinquer' : '' ;
?>">
    <div class="content">
      <h1 data-aos="fade-down"><?php echo get_the_title()?></h1>
      <p data-aos="fade-up"><?php echo nl2br(get_field('texto_listagem'))?></p>
      <div class="highlight-area" data-aos="fade-right">
        <?php if(get_field('imagem_destaque')) {?>
          <div class="img">
            <img src="<?php echo get_field('imagem_destaque') ?>" alt="">
          </div>
        <?php }?>
        <?php if(get_field('ficha_tecnica')) {?>
          <div class="actions" data-aos="fade-left">
            <a href="<?php echo get_field('ficha_tecnica')?>" class="btn"><?php echo pll_current_language() == 'en' ? 'technical sheet' : 'ficha técnica'?></a>
            <a href="<?php echo get_the_permalink(pll_current_language()  == 'en' ? 21 : 17)?>" class="btn"><?php echo pll_current_language() == 'en' ? 'contact us' : 'Entre em contato'?></a>
          </div>
        <?php }?>
      </div>
    </div>
</section>
<section class="product_section_2 <?php $currentCat = pll_current_language() == 'en' ? 'zero-clinquer' : 'zero-clinquer-pt';
echo has_term( $currentCat, 'cat_produtos' ) ? 'zero-clinquer' : '' ;
?>">
  <img class="product-cover" data-aos="fade-up" src="<?php echo get_field('imagem_conteudo')?>" alt="">
  <div class="product-content">
    <?php the_content()?>
  </div>
</section>

<?php
  get_footer();
?>