<?php

/**
 * Template Name: Zero Clinquer
 */
get_header();
?>
<section class="cover" style="background-image: url(<?php echo get_field('capa') ?>)">
</section>
<section class="zero_section_1">
    <div class="content">
        <h1 data-aos="fade-up"><?php echo get_field('titulo') ?></h1>
        <p data-aos="fade-down" data-aos-delay="200"><?php echo nl2br(get_field('texto')) ?></p>
    </div>
    <div class="products-list">
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
        $product_count = 0;

        // Loop
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $product_count++;
                $product_delay = $product_count * 150;
        ?>
                <div class="product" data-aos="fade-up" data-aos-delay="<?php echo $product_delay ?>">
                    <a href="<?php the_permalink() ?>"></a>
                    <div class="product-image">
                        <img src="<?php echo get_field('imagem_listagem') ?>" alt="">
                    </div>
                    <div class="product-text">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_excerpt() ?></p>
                    </div>
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
