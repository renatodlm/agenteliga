<footer>
    <div class="row align-center">
        <div class="column small-12 medium-2" data-aos="fade-up" data-aos-delay="0">
            <?php the_custom_logo() ?>
        </div>
        <div class="column small-12 medium-2" data-aos="fade-up" data-aos-delay="100">
            <?php $currentLang = pll_current_language() ?>
            <h3><?php echo $currentLang == 'en' ? 'Navigate through the site' : 'Navegue pelo site' ?></h3>
            <ul>
                <?php $current_lang_page_id = function_exists('pll_get_post') ? pll_get_post(9) : 9;
                $page_title = get_the_title($current_lang_page_id);
                $page_link  = get_permalink($current_lang_page_id);
                echo '<li><a href="' . esc_url($page_link) . '">' . esc_html($page_title) . '</a></li>' ?>
                <?php $current_lang_page_id = function_exists('pll_get_post') ? pll_get_post(11) : 11;
                $page_title = get_the_title($current_lang_page_id);
                $page_link  = get_permalink($current_lang_page_id);
                echo '<li><a href="' . esc_url($page_link) . '">' . esc_html($page_title) . '</a></li>' ?>
                <?php $current_lang_page_id = function_exists('pll_get_post') ? pll_get_post(13) : 13;
                $page_title = get_the_title($current_lang_page_id);
                $page_link  = get_permalink($current_lang_page_id);
                echo '<li><a href="' . esc_url($page_link) . '">' . esc_html($page_title) . '</a></li>' ?>
                <?php $current_lang_page_id = function_exists('pll_get_post') ? pll_get_post(17) : 17;
                $page_title = get_the_title($current_lang_page_id);
                $page_link  = get_permalink($current_lang_page_id);
                echo '<li><a href="' . esc_url($page_link) . '">' . esc_html($page_title) . '</a></li>' ?>
            </ul>
        </div>
        <div class="column small-12 medium-2" data-aos="fade-up" data-aos-delay="200">
            <h3><?php echo $currentLang == 'en' ? 'Zero Clinquer Products' : 'Produtos zero Clínquer' ?></h3>
            <ul>
                <?php
                // ID da categoria no idioma principal (ex: português)
                $original_term_id = 19; // substitua pelo ID da categoria "Zero Clínquer" em português

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
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <li><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum produto encontrado.</p>';
                endif;
                ?>
            </ul>

        </div>
        <div class="column medium-2" data-aos="fade-up" data-aos-delay="300">
            <h3><?php echo $currentLang == 'en' ? 'Clinquer Products' : 'Produtos com Clínquer' ?></h3>
            <ul>
                <?php
                // ID da categoria no idioma principal (ex: português)
                $original_term_id = 19; // substitua pelo ID da categoria "Zero Clínquer" em português
                $original_term_id_2 = 39; // substitua pelo ID da categoria "Zero Clínquer" em português

                // Pega o idioma atual
                $current_lang = pll_current_language();

                // Converte o ID da categoria para o termo no idioma atual
                $translated_term_id = pll_get_term($original_term_id, $current_lang);
                $translated_term_id_2 = pll_get_term($original_term_id_2, $current_lang);
                // Faz a query
                $args = [
                    'post_type' => 'produto',
                    'posts_per_page' => -1,
                    'tax_query' => [
                        [
                            'taxonomy' => 'cat_produtos', // ou o nome da sua taxonomia de produtos
                            'field' => 'term_id',
                            'terms' => [$translated_term_id, $translated_term_id_2],
                            'operator' => 'NOT IN'
                        ]
                    ],
                    'lang' => $current_lang, // força retornar apenas no idioma atual
                ];

                $query = new WP_Query($args);

                // Loop
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <li><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum produto encontrado.</p>';
                endif;
                ?>
            </ul>
        </div>
        <div class="column small-12 medium-2" data-aos="fade-up" data-aos-delay="200">
            <h3><?php echo $currentLang == 'en' ? 'Services' : 'Serviços' ?></h3>
            <ul>
                <?php
                // ID da categoria no idioma principal (ex: português)
                $original_term_id = 39; // substitua pelo ID da categoria "Zero Clínquer" em português

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
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <li><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum produto encontrado.</p>';
                endif;
                ?>
            </ul>

        </div>

        <div class="column small-12 medium-2" data-aos="fade-up" data-aos-delay="400">
            <h3><?php echo $currentLang == 'en' ? 'Talk to us' : 'Fale com a gente' ?></h3>
            <?php
            // Sempre mostrar widgets comuns
            if (is_active_sidebar('footer_common')) {
                dynamic_sidebar('footer_common');
            }
            ?>
        </div>
    </div>
</footer>
<!-- fecha divs scroll smoother-->
</div>
</div>
<!--  -->

<?php wp_footer() ?>

</body>

</html>
