<?php
/**
 * Template Name: Home
 */
  get_header();
?>
<section class="hero">
  <div class="content">
    <h1><?php echo get_field('titulo')?></h1>
    <p><?php echo nl2br(get_field('texto_banner'))?></p>
    <a class="btn" href="<?php echo get_permalink(pll_current_language() == 'en' ? 26 : 13)?>"><?php echo pll_current_language() == 'en' ? 'Our products' : 'Nossos produtos'?></a>
  </div>
  <div class="background-fill" style="background-image: url(<?php echo get_field('capa')?>"></div>
  <div class="background-fill-mobile" style="background-image: url(<?php echo get_field('capa_mobile')?>"></div>
  <div class="logo-container">    
    <img src="<?php echo get_template_directory_uri()?>/assets/logo-liga.png" alt="Logo Liga" class="logo">
  </div>
</section>
<section class="home_section_1">
  <div class="cards">
    <?php 
      $count = 1;
      $cardTitle = get_field('cards_titulo_'. $count);
      while ($cardTitle) {
        $delay = $count * 100; // Delay progressivo para cada card
        ?>
        <div class="card" data-aos="fade-up" data-aos-delay="<?php echo $delay?>">
          <img src="<?php echo get_field('cards_icone_' . $count)?>" alt="">
          <h3><?php echo $cardTitle?></h3>
          <p><?php echo nl2br(get_field('cards_texto_' . $count))?></p>
        </div>
        <?php
          $count++;
          $cardTitle = get_field('cards_titulo_'. $count);
      }
    ?>
  </div>
  <div class="content">
    <h2 data-aos="fade-up" data-aos-delay="200"><?php echo get_field('titulo_sobre')?></h2>    
	  <?php echo get_field('imagem_sobre')?>
  </div>
</section>
<section class="home_section_2">
  <div class="quote" data-aos="fade-up" data-aos-duration="1000">
    <p><?php echo nl2br(get_field('texto_sobre'))?></p>
    <p data-aos="fade-up" data-aos-delay="300"><?php echo get_field('nome_citacao')?></p>
  </div>
</section>
<section class="home_section_3">
    <h2 data-aos="fade-up"><?php echo get_field('destaque')?></h2>
    <div class="products">
      <?php
        // ID da categoria no idioma principal (ex: português)
        $original_term_id = 38; // substitua pelo ID da categoria "Zero Clínquer" em português

        // Pega o idioma atual
        $current_lang = pll_current_language();

        // Converte o ID da categoria para o termo no idioma atual
        $translated_term_id = pll_get_term($original_term_id, $current_lang);

        // Faz a query
        $args = [
          'post_type' => 'produto',
          'posts_per_page' => -1,
          'tax_query' => [
            [
              'taxonomy' => 'cat_produtos', // ou o nome da sua taxonomia de produtos
              'field' => 'term_id',
              'terms' => $translated_term_id,
            ]
          ],
          'lang' => $current_lang, // força retornar apenas no idioma atual
        ];

        $query = new WP_Query($args);

        // Loop
        $product_count = 0;
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            $product_count++;
            $product_delay = $product_count * 150;
            ?>
              <div class="product-card" data-aos="fade-up" data-aos-delay="<?php echo $product_delay?>">
                <img src="<?php echo get_field('imagem_destaque')?>" alt="">
                <h3><?php the_title()?></h3>
                <a href="<?php the_permalink()?>"></a>
              </div>
            <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>Nenhum produto encontrado.</p>';
        endif;
        ?>
    </div>
</section>

<?php
  get_footer();
?>