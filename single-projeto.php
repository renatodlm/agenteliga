<?php
  get_header();
  $bgTopo = get_field('imagem_topo');
  if(str_contains($bgTopo, '.mp4')){
    echo "<section class='project-hero'>";
    echo "<video muted autoplay loop src='" . $bgTopo . "'></video>";
  } else {
    echo "<section class='project-hero' style='background-image: url(" . $bgTopo . ");'>";
  }
?>
</section>
<div class="project-hero__content">
  <p class="tags">
    <?php $tags = get_field('tags');
      if ($tags) {
        $linhas = array_filter(array_map('trim', explode("\n", $tags)));
        foreach ($linhas as $linha) {
          if($linha === array_key_last($linhas)) {
            echo '<span>' . esc_html($linha) . '</span>';
          } else {
            echo '<span>' . esc_html($linha) . '</span>, ';
          }
        }
      }
    ?>
  </p>
  <h1>
    <?php the_title();?>
  </h1>
  <p>
    <?php echo get_field('intro')?>
  </p>
</div>
<section class="project-overview">
  <div class="info">
    <div class="data">
      <h3>Client</h3>
      <p>
        <?php the_title();?>
      </p>
    </div>
    <div class="data">
      <h3>Project</h3>
      <p>
        <?php echo get_field('informacoes_do_projeto_data_projeto')?>
      </p>
    </div>
    <div class="data">
      <h3>Our role</h3>
      <ul>
        <?php $tags = get_field('informacoes_do_projeto_servicos');
          if ($tags) {
            $linhas = array_filter(array_map('trim', explode("\n", $tags)));
            foreach ($linhas as $linha) {
              echo '<li>' . esc_html($linha) . '</li>';
            }
          }
        ?>
      </ul>
    </div>
    <div class="data">
      <h3>Credits</h3>
      <ul>
        <?php $tags = get_field('informacoes_do_projeto_creditos');
          if ($tags) {
            $linhas = array_filter(array_map('trim', explode("\n", $tags)));
            foreach ($linhas as $linha) {
              echo '<li>' . esc_html($linha) . '</li>';
            }
          }
        ?>
      </ul>
    </div>
  </div>
  <div class="briefing">
    <p>
      <?php echo nl2br(get_field('informacoes_do_projeto_resumo'))?>
    </p>
  </div>
</section>
<section class="project-content">
  <?php the_content()?>
</section>
<section class="project-related">
  <?php
      $the_query = new WP_Query( array(
        'post_type' => 'projeto',
        'post__not_in' => [get_the_ID()],
        'posts_per_page' => 2, 
    ) );
      if ( $the_query->have_posts() ) {
    ?>
  <h2>more projects</h2>
  <div class="projects">
          <?php
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
</section>

<?php
  get_footer();
?>