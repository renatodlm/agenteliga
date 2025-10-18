<?php

function custom_theme_assets()
{
    wp_enqueue_script('jquery-js', 'https://code.jquery.com/jquery-3.7.1.min.js', '3.7.1', true);
    wp_enqueue_script('foundation-js', get_template_directory_uri() . '/vendors/foundation/foundation.min.js', '6.6.3', true);
    wp_enqueue_style('foundation-css', get_template_directory_uri() . '/vendors/foundation/foundation.min.css', '6.6.3', 'all');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/vendors/slick/slick.min.js', '6.6.3', true);
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/vendors/slick/slick.css', '6.6.3', 'all');

    // AOS (Animate On Scroll)
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', '2.3.1', 'all');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', '2.3.1', true);
    wp_enqueue_script('gsap-js', 'https://unpkg.com/gsap@3/dist/gsap.min.js', '2.3.1', true);
    wp_enqueue_script('scrollsmoother-js', 'https://unpkg.com/gsap@3/dist/ScrollSmoother.min.js', '2.3.1', true);
    wp_enqueue_script('scrolltriger-js', 'https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js', '2.3.1', true);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/scripts/main.js', array('aos-js'), time(), true);
    wp_enqueue_script('accordion-js', get_template_directory_uri() . '/scripts/accordion.js', '1.0', true);
    wp_enqueue_style('template', get_template_directory_uri() . '/css/main.css', array(), time(), 'all');
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');



function estudio_config()
{

    add_theme_support('post-thumbnails', array(
        'post',
        'page',
        'material',
        'servico',
        'slide',
    ));

    // Registrando menus

    register_nav_menus(

        array(

            'main_menu' => __('Menu Principal', 'estudio86')

        )

    );

    add_filter('widget_title', function ($title) {
        return do_shortcode($title);
    });


    add_theme_support('post-formats', array('video', 'image'));

    add_theme_support('title-tag');

    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'estudio_config', 0);

function meu_tema_load_textdomain()
{
    load_theme_textdomain('86', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'meu_tema_load_textdomain');

function meu_tema_widgets_footer()
{
    // Área comum
    register_sidebar([
        'name'          => __('Rodapé - Comum', '86'),
        'id'            => 'footer_common',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);

    // Área em português
    register_sidebar([
        'name'          => __('Rodapé - Português', '86'),
        'id'            => 'footer_pt',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);

    // Área em inglês
    register_sidebar([
        'name'          => __('Rodapé - Inglês', '86'),
        'id'            => 'footer_en',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'meu_tema_widgets_footer');


function create_post_types()
{
    $taxlabels = array(

        'name' => _x('cat_clientes', 'Categorias de clientes'),

        'singular_name' => _x('cat_cliente', 'Categoria de cliente'),

        'search_items' =>  __('Pesquisar'),

        'all_items' => __('Todas as Categorias de clientes'),

        'parent_item' => __('Categoria Pai'),

        'parent_item_colon' => __('Categoria Pai:'),

        'edit_item' => __('Editar'),

        'update_item' => __('Atualizar'),

        'add_new_item' => __('Adicionar novo'),

        'new_item_name' => __('Novo Nome'),

        'menu_name' => __('Categorias clientes'),

    );

    // Now register the taxonomy



    //  register_taxonomy('cat_clientes',array('cliente'), array(

    //    'hierarchical' => true,

    //    'labels' => $taxlabels,

    //    'show_ui' => true,

    //    'show_admin_column' => true,

    //    'query_var' => true,

    //    'rewrite' => array( 'slug' => 'cat_clientes=' ),

    //  ));

    $labels = array(

        'name'                =>  'Cliente',

        'singular_name'       =>  'Cliente',

        'add_new'             =>  'Adicionar Novo',

        'add_new_item'        =>  'Adicionar Novo Cliente',

        'edit_item'           =>  'Editar Cliente',

        'new_item'            =>  'Novo Cliente',

        'all_items'           =>  'Todos Clientes',

        'view_item'           =>  'Ver Cliente',

        'search_items'        =>  'Pesquisar Clientes',

        'not_found'           =>  'Nenhum Cliente encontrado',

        'not_found_in_trash'  =>  'Nenhum Cliente no Lixo',

        'menu_name'           =>  'Clientes',

    );



    $supports = array('title', 'editor', 'thumbnail');





    $args = array(

        'labels'              => $labels,

        'public'              => true,

        'publicly_queryable'  => true,

        'show_ui'             => true,

        'show_in_menu'        => true,

        'query_var'           => true,

        'taxonomies'  => array('cat_clientes'),

        'capability_type'     => 'post',

        'has_archive'         => 'cat_clientes',

        'hierarchical'        => false,

        'menu_position'       => 4,

        'show_in_rest'        => true,

        'supports'            => $supports,

    );



    //  register_post_type( 'cliente', $args );

    $taxlabels = array(

        'name' => _x('cat_produtos', 'Categorias de produtos'),

        'singular_name' => _x('cat_produto', 'Categoria de produto'),

        'search_items' =>  __('Pesquisar'),

        'all_items' => __('Todas as Categorias de Produtos'),

        'parent_item' => __('Categoria Pai'),

        'parent_item_colon' => __('Categoria Pai:'),

        'edit_item' => __('Editar'),

        'update_item' => __('Atualizar'),

        'add_new_item' => __('Adicionar novo'),

        'new_item_name' => __('Novo Nome'),

        'menu_name' => __('Categorias Produtos'),

    );

    // Now register the taxonomy



    register_taxonomy('cat_produtos', array('produto'), array(

        'hierarchical' => true,

        'labels' => $taxlabels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'cat_produto'),

    ));

    $labels = array(

        'name'                =>  'Produto',

        'singular_name'       =>  'Produto',

        'add_new'             =>  'Adicionar Novo',

        'add_new_item'        =>  'Adicionar Novo Produto',

        'edit_item'           =>  'Editar Produto',

        'new_item'            =>  'Novo Produto',

        'all_items'           =>  'Todos Produtos',

        'view_item'           =>  'Ver Produto',

        'search_items'        =>  'Pesquisar Produtos',

        'not_found'           =>  'Nenhum Produto encontrado',

        'not_found_in_trash'  =>  'Nenhum Produto no Lixo',

        'menu_name'           =>  'Produtos',

    );



    $supports = array('title', 'editor', 'thumbnail', 'excerpt');





    $args = array(

        'labels'              => $labels,

        'public'              => true,

        'publicly_queryable'  => true,

        'show_ui'             => true,

        'show_in_menu'        => true,

        'query_var'           => true,

        'taxonomies'  => array('cat_produtos'),

        'capability_type'     => 'post',

        'has_archive'         => 'cat_produtos',

        'hierarchical'        => false,

        'menu_position'       => 4,

        'show_in_rest'        => true,

        'supports'            => $supports,

    );



    register_post_type('produto', $args);

    $taxlabels = array(

        'name' => _x('cat_servicos', 'Categorias de serviços'),

        'singular_name' => _x('cat_produto', 'Categoria de serviço'),

        'search_items' =>  __('Pesquisar'),

        'all_items' => __('Todas as Categorias de Serviços'),

        'parent_item' => __('Categoria Pai'),

        'parent_item_colon' => __('Categoria Pai:'),

        'edit_item' => __('Editar'),

        'update_item' => __('Atualizar'),

        'add_new_item' => __('Adicionar novo'),

        'new_item_name' => __('Novo Nome'),

        'menu_name' => __('Categorias Serviços'),

    );

    // Now register the taxonomy



    //  register_taxonomy('cat_servicos',array('servico'), array(

    //    'hierarchical' => true,

    //    'labels' => $taxlabels,

    //    'show_ui' => true,

    //    'show_admin_column' => true,

    //    'query_var' => true,

    //    'rewrite' => array( 'slug' => 'cat_servico' ),

    //  ));

    $labels = array(

        'name'                =>  'Serviço',

        'singular_name'       =>  'Serviço',

        'add_new'             =>  'Adicionar Novo',

        'add_new_item'        =>  'Adicionar Novo Serviço',

        'edit_item'           =>  'Editar Serviço',

        'new_item'            =>  'Novo Serviço',

        'all_items'           =>  'Todos Serviços',

        'view_item'           =>  'Ver Serviço',

        'search_items'        =>  'Pesquisar Serviços',

        'not_found'           =>  'Nenhum Serviço encontrado',

        'not_found_in_trash'  =>  'Nenhum Serviço no Lixo',

        'menu_name'           =>  'Serviços',

    );



    $supports = array('title', 'editor', 'thumbnail');





    $args = array(

        'labels'              => $labels,

        'public'              => true,

        'publicly_queryable'  => true,

        'show_ui'             => true,

        'show_in_menu'        => true,

        'query_var'           => true,

        'taxonomies'  => array('cat_servicos'),

        'capability_type'     => 'post',

        'has_archive'         => 'cat_servicos',

        'hierarchical'        => false,

        'menu_position'       => 4,

        'show_in_rest'        => true,

        'supports'            => $supports,

    );



    //  register_post_type( 'servico', $args );

    $taxlabels = array(

        'name' => _x('cat_equipes', 'Categorias de produtos'),

        'singular_name' => _x('cat_equipe', 'Categoria de equipe'),

        'search_items' =>  __('Pesquisar'),

        'all_items' => __('Todas as Categorias de equipes'),

        'parent_item' => __('Categoria Pai'),

        'parent_item_colon' => __('Categoria Pai:'),

        'edit_item' => __('Editar'),

        'update_item' => __('Atualizar'),

        'add_new_item' => __('Adicionar novo'),

        'new_item_name' => __('Novo Nome'),

        'menu_name' => __('Categorias Equipes'),

    );

    // Now register the taxonomy



    //  register_taxonomy('cat_equipes',array('membro'), array(

    //    'hierarchical' => true,

    //    'labels' => $taxlabels,

    //    'show_ui' => true,

    //    'show_admin_column' => true,

    //    'query_var' => true,

    //    'rewrite' => array( 'slug' => 'cat_equipe' ),

    //  ));

    $labels = array(

        'name'                =>  'Equipe',

        'singular_name'       =>  'Membro',

        'add_new'             =>  'Adicionar Novo',

        'add_new_item'        =>  'Adicionar Novo Membro',

        'edit_item'           =>  'Editar Membro',

        'new_item'            =>  'Novo Membro',

        'all_items'           =>  'Todos Membros',

        'view_item'           =>  'Ver Membro',

        'search_items'        =>  'Pesquisar Membros',

        'not_found'           =>  'Nenhum Membro encontrado',

        'not_found_in_trash'  =>  'Nenhum Membro no Lixo',

        'menu_name'           =>  'Equipe',

    );



    $supports = array('title', 'editor', 'thumbnail');





    $args = array(

        'labels'              => $labels,

        'public'              => true,

        'publicly_queryable'  => true,

        'show_ui'             => true,

        'show_in_menu'        => true,

        'query_var'           => true,

        'taxonomies'  => array('cat_equipes'),

        'capability_type'     => 'post',

        'has_archive'         => 'cat_equipes',

        'hierarchical'        => false,

        'menu_position'       => 4,

        'show_in_rest'        => true,

        'supports'            => $supports,

    );



    //  register_post_type( 'membro', $args );

}
add_action('init', 'create_post_types');
