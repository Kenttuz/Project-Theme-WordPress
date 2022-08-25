<?php

require get_template_directory() . '/inc/customizer.php';

//colocar o nome do tema como prefix em todo código
//filetime apenas no desenvolvimento, na produção voltar para versão do theme
function wpdevs_load_scripts()
{
    wp_enqueue_style('wpdevs-style', get_stylesheet_uri(), array(), fileatime(get_template_directory() . '/style.css'), 'all');

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null, 'all');

    wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true);
}
//Quando for carregada chama o gancho wp_enqueue_scripts e executa a nossa função que chama a nossa folha de estilos
add_action('wp_enqueue_scripts', 'wpdevs_load_scripts');

function wpdevs_config()
{
    //internacionalização do thema (tradução)
    $textdomain = 'wp-devs';
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/');

    //array(slug => nome) / __() para tradução
    register_nav_menus(array(
        'wp_devs_main_menu' => __('Main Menu', 'wp-devs'),
        'wp_devs_footer_menu' => __('Footer Menu', 'wp-devs')
    ));

    //Deifindo o theme support para imagem customizada de cabeçalho
    add_theme_support(
        'custom-header',
        array(
            'height' => 225,
            'width' => 1920
        )
    );

    //Deifindo o theme support thumbs customizadas
    add_theme_support('post-thumbnails');
    //Deifindo o theme support logos customizadas
    add_theme_support('custom-logo', array(
        'height' => 200,
        'width' => 110,
        'flex-height' => true,
        'flex-width' => true
    ));
    //para poderme ser consumidos por leitores de feeds
    add_theme_support('automatic-feed-links');

    //Adapta a marcação html de alguns elementos
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

    //BLOCOS GUTENBERG (apenas para estudo) / Gallery about
    // add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');
    add_theme_support('wp-block-styles');

    //definindo cores diferentes na paleta dos paragrafos e botões (USANDO O THEME.JSON)
    // add_theme_support('editor-color-palette', array(
    //     array(
    //         'name' => __('Primary', 'wp-devs'),
    //         'slug' => 'primary',
    //         'color' => '#001E32'
    //     ),
    //     array(
    //         'name' => __('Secondary', 'wp-devs'),
    //         'slug' => 'secondary',
    //         'color' => '#CFAF07'
    //     )
    // ));
    //Fim blocos gutenberg

    add_theme_support('title-tag');
};
add_action('after_setup_theme', 'wpdevs_config', 0);

//FUNÇÃO NA UTILIZAÇÃO DO BLOCK BUTENBERG (APENAS PARA ESTUDO)
function wpdevs_register_block_styles()
{
    wp_register_style('wpdevs-block-style', get_template_directory_uri() . '/block-style.css');
    register_block_style(
        'core/quote',
        array(
            'name' => 'red-quote',
            'label' => 'Red Quote',
            'is_default' => true,
            //Outro modo de registrar a cor inline
            // 'inline_style' => '.wp-block-quote.is-style-red-quote { border-left: 7px solid #ff0000; background: #f9f3f3; padding: 10px 20px; }',
            'style_handle' => 'wpdevs-block-style'
        )
    );
    register_block_style(
        'core/paragraph',
        array(
            'name' => 'escarlate-paragraph',
            'label' => 'Escarlate Paragraph',
            //Outro modo de registrar a cor inline
            // 'inline_style' => '.wp-block-quote.is-style-red-quote { border-left: 7px solid #ff0000; background: #f9f3f3; padding: 10px 20px; }',
            'style_handle' => 'wpdevs-block-style'
        )
    );
}
add_action('init', 'wpdevs_register_block_styles');
//Fim blocos gutenberg

function wpdevs_sidebars()
{
    register_sidebar(
        array(
            'name' => __('Blog Sidebar', 'wp-devs'),
            'id' => 'sidebar-blog',
            'description' => __('This is the Blog Sidebar .You can add your widgets here.', 'wp-devs'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => __('Service 1', 'wp-devs'),
            'id' => 'services-1',
            'description' => __('This is the Services1 .You can add your widgets here.', 'wp-devs'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' =>  __('Service 2', 'wp-devs'),
            'id' => 'services-2',
            'description' => __('This is the Services2 .You can add your widgets here.', 'wp-devs'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => __('Service 3', 'wp-devs'),
            'id' => 'services-3',
            'description' => __('This is the Services3 .You can add your widgets here.', 'wp-devs'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'wpdevs_sidebars');

//Criando o gancho de ação wp body open se não existir
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}
