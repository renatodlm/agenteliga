<?php
  get_header();
?>
<section class="hero">
  <div class="content">
    <h1>we're your <br>
      <span>new <br> creative</span>
      partner
    </h1>
    <p><?php echo get_field('intro')?></p>
  </div>
  <div class="circle">
    <img src="<?php echo get_template_directory_uri()?>/assets/hero-circle.png" alt="">
  </div>
  <div class="scroll-btn">
    <button>
      <img src="<?php echo get_template_directory_uri()?>/assets/arrow.svg" alt="">
    </button>
  </div>
</section>
<section id="whatWeDo" class="about dark">
  <div class="container">
    <div class="marquee">
      <div class="marquee-content">

        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
        <span>what we do</span>
        *
      </div>
    </div>
    <div class="row align-right expanded collapse">
      <div class="column small-12 medium-5">
        <div class="scroll-text">
          <div class="inner">
            <p class="font-lg"><?php echo get_field('what_we_do')?></p>
          </div>
        </div>
      </div>
    </div>
    <ul class="accordion" data-accordion data-allow-all-closed="true">
      <?php
        $the_query = new WP_Query( array(
          'post_type' => 'servico'          
      ) );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
          ?>
          <li class="accordion-item" data-accordion-item data-interacao>
            <a href="#" class="accordion-title"><?php the_title() ?></a>
            <div class="accordion-content" data-tab-content>
              <div class="row align-justify expanded collapse">
                <div class="column small-12 medium-3 medium-order-1">
                  <img src="<?php echo get_field('imagem_servico')?>" alt="">
                </div>
                <div class="column small-12 medium-7">
                  <p class="font-sm"><?php echo get_field('texto_servico') ?></p>
                  <ul>
                    <?php $tags = get_field('tags');
                      if ($tags) {
                        $linhas = explode("\n", $tags);
                        foreach ($linhas as $linha) {
                          echo '<li>' . esc_html($linha) . '</li>';
                        }
                      }
                    ?>
                  </ul>
                  <a class="btn" href="#workWithUs" data-subject="<?php echo get_the_title()?>">work with us</a>
                </div>
              </div>
            </div>
          </li>
    <?php
            }
        } 
        wp_reset_postdata();          
    ?>
      
    </ul>
  </div>
</section>
<section class="clients">
  <h2>our clients</h2>
  <div class="row align-center">
    <div class="column small-12 medium-9">
      <div class="clients-carousel">
        <?php
        $the_query = new WP_Query( array(
          'post_type' => 'cliente'          
          ) );
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
              ?>
              <div class="slide">
                <img src="<?php echo get_field('imagem')?>" alt="">
              </div>
        <?php
                }
            } 
            wp_reset_postdata();          
        ?>
      </div>
    </div>
  </div>
</section>
<section id="work" class="work">
  <h2>work</h2>
  <span class="lettering">work</span>
  <div class="projects">
    <?php
        $the_query = new WP_Query( array(
          'post_type' => 'projeto'          
      ) );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
          ?>
          <div class="project">
            <div class="project-image">
              <a href="<?php echo get_permalink()?>">
                <img src="<?php echo get_field('poster')?>" alt="">
              </a>
            </div>
            <div class="project-description">
              <h3><?php the_title()?></h3>
              <p><?php echo get_field('intro')?></p>
              <div class="tags">
                <?php $tags = get_field('tags');
                  if ($tags) {
                    $linhas = array_filter(array_map('trim', explode("\n", $tags)));
                    foreach ($linhas as $linha) {
                      if($linha === array_key_last($linhas)) {
                        echo '<a href="#">' . esc_html($linha) . '</a>';
                      } else {
                        echo '<a href="#">' . esc_html($linha) . '</a>, ';
                      }
                    }
                  }
                ?>
              </div>
            </div>

          </div>
    <?php
            }
        } 
        wp_reset_postdata();          
    ?>
  </div>
  <!--<a href="<?php echo get_permalink(8)?>" class="btn">see all work</a>-->
</section>
<section id="whoWeAre" class="team dark">
  <div class="row expanded collapse">
    <div class="column small-12 medium-6">
      <h2>who we are</h2>
    </div>
    <div class="column small-12 medium-6">
      <p><?php echo nl2br(get_field('who_we_are'))?></p>
    </div>
  </div>
  <div class="team-members">
    <?php
        $the_query = new WP_Query( array(
          'post_type' => 'membro'          
      ) );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
          ?>
          <div class="member">
            <div class="member-image">
              <img src="<?php echo get_field('foto')?>" alt="">
            </div>
            <div class="member-description">
              <?php 
                $title = get_the_title();
                $partes = explode(' ', $title);
                if (count($partes) > 1) {
                  $nome = $partes[0]; // Primeiro nome
                  $sobrenome = implode(' ', array_slice($partes, 1)); // Todo o restante é sobrenome
                } else {
                  $nome = $nome_completo; // Caso seja apenas um nome
                  $sobrenome = '';
                }
                echo '<h3>' . $nome . ' <strong>' . $sobrenome . '</strong>'  . '</h3>'
              ?>
              <p><?php echo get_field('cargo')?></p>
            </div>
            <div class="member-social">
              <a target="_blank" href="<?php echo get_field('instagram')?>">
                <img src="<?php echo get_template_directory_uri()?>/assets/instagram.svg" alt="">
              </a>
              <a target="_blank" href="<?php echo get_field('linkedin')?>">
                <img src="<?php echo get_template_directory_uri()?>/assets/in.svg" alt="">
              </a>
            </div>
          </div>
    <?php
            }
        } 
        wp_reset_postdata();          
    ?>
  </div>
</section>
<?php
  get_footer();
?>