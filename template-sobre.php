<?php
/**
 * Template Name: Sobre
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
<section class="about_section_2">
  <div class="cards">
    <?php 
      $count = 1;
      $cardTitle = get_field('cards_titulo_'. $count);
      while ($cardTitle) {
        $delay = $count * 150;
        ?>
        <div class="card" data-aos="fade-up" data-aos-delay="<?php echo $delay?>">
          <p class="card-number"><?php echo '#' . ($count > 9 ? '' : '0') . $count?></p>
          <h3><?php echo $cardTitle?></h3>
          <p><?php echo nl2br(get_field('cards_texto_' . $count))?></p>
        </div>
        <?php
          $count++;
          $cardTitle = get_field('cards_titulo_'. $count);
      }
    ?>
  </div>
</section>

<?php
  get_footer();
?>