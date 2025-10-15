<?php
  get_header();
?>
<section id="work" class="work">
  <h2>work</h2>
  <!-- <span class="lettering">work</span> -->
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
</section>
<?php
  get_footer();
?>