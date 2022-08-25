<?php

function wpdevs_customizer($wp_customize)
{
    // 1 Copyright Section
    //configs: 'id/nome', 'array de argumentos'
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => __('Copyright Settings', 'wp-devs'),
            'description' => __('Copyright Settings', 'wp-devs')
        )
    );

    //Setando as configurações / ler a documentação!
    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => 'Copyright X - All Rights Reserved',
            //altera os caracteres inválidos inseridos pelo usuário
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    //Controles
    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_copyright',
        array(
            'label' => __('Copyright Information', 'wp-devs'),
            'description' => __('Please, type your copyright here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );

    // 2 hero
    $wp_customize->add_section(
        'sec_hero',
        array(
            'title' => __('Hero Settings', 'wp-devs')
        )
    );

    //Title
    $wp_customize->add_setting(
        'set_hero_title',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => __('Please, add some title', 'wp-devs'),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_hero_title',
        array(
            'label' => __('Hero Title', 'wp-devs'),
            'description' => __('Please, type your Hero title here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_hero',
            'type' => 'text'
        )
    );

    //subtitle
    $wp_customize->add_setting(
        'set_hero_subtitle',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => __('Please, add some subtitle', 'wp-devs'),
            'sanitize_callback' => 'sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_hero_subtitle',
        array(
            'label' => __('Hero Subtitle', 'wp-devs'),
            'description' => __('Please, type your Hero subtitle here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_hero',
            'type' => 'textarea'
        )
    );

    //Button text
    $wp_customize->add_setting(
        'set_hero_button_text',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => __('Learn More', 'wp-devs'),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_hero_button_text',
        array(
            'label' => __('Hero Button Text', 'wp-devs'),
            'description' => __('Please, type your Hero button text here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_hero',
            'type' => 'text'
        )
    );

    //  Button Link
    $wp_customize->add_setting(
        'set_hero_button_link',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_hero_button_link',
        array(
            'label' => __('Hero Button Link', 'wp-devs'),
            'description' => __('Please, type your Hero button link here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_hero',
            'type' => 'url'
        )
    );

    //  Hero Height
    $wp_customize->add_setting(
        'set_hero_height',
        array(
            'type' => 'theme_mod',
            //valor padrão da config
            'default' => 800,
            //absint (numeros inteiros positivos)
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        //aqui precisa passar o mesmo nome da setting!
        'set_hero_height',
        array(
            'label' => __('Hero Height', 'wp-devs'),
            'description' => __('Please, type your Hero Height here', 'wp-devs'),
            //aqui precisa passar o mesmo nome da section!
            'section' => 'sec_hero',
            'type' => 'number'
        )
    );

    //  Hero Background
    $wp_customize->add_setting(
        'set_hero_background',
        array(
            'type' => 'theme_mod',
            //pois o controle personalizado guarda o id da imagem e não a ulr
            'sanitize_callback' => 'absint'
        )
    );

    //Criando controle personalizado
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'set_hero_background',
            array(
                'label' => __('Hero Image', 'wp-devs'),
                'section' => 'sec_hero',
                'mime_type' => 'image'
            )
        )
    );

    // 3. Blog
    $wp_customize->add_section(
        'sec_blog',
        array(
            'title' => __('Blog Section', 'wp-devs')
        )
    );

    // Posts per page
    $wp_customize->add_setting(
        'set_per_page',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_per_page',
        array(
            'label' => __('Posts per page', 'wp-devs'),
            'description' => __('How many items to display in the post list?', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'number'
        )
    );

    // Post categories to include
    $wp_customize->add_setting(
        'set_post_include',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_post_include',
        array(
            'label' => __('Post to include', 'wp-devs'),
            'description' => __('Comma separated values or single post ID', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );

    // Post categories to exclude
    $wp_customize->add_setting(
        'set_post_exclude',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_post_exclude',
        array(
            'label' => __('Post to exclude', 'wp-devs'),
            'description' => __('Comma separated values or single post ID', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'wpdevs_customizer');
