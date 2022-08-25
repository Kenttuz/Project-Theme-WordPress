<?php
/*
Template Name: General Template
*/
?>

<?php get_header() ?>

<?php get_template_part('parts/banner-header') ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="siter-main">

            <div class="container">
                <div class="general-template">
                    <!-- área dinâmica, o wp procura se têm post e ENQUANTO tiver ele vai ficar colocando neste espaço, se não tiver mostre o parágrafo No post found. -->
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post(); ?>

                            <article>
                                <h1><?php the_title() ?></h1>
                                <!-- pegando o conteúdo do post em si -->
                                <?php the_content() ?>
                            </article>

                        <?php
                        endwhile;

                    else : ?>
                        <p><?php esc_html_e('No post found', 'wp-devs') ?></p>
                    <?php endif; ?>

                </div>

        </main>
    </div>
</div>

<?php get_footer() ?>