<?php get_header() ?>

<?php get_template_part('parts/banner-header') ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="siter-main">
            <h1><?php esc_html_e('Blog', 'wp-devs') ?></h1>
            <div class="container">
                <div class="blog-items">
                    <!-- área dinâmica, o wp procura se têm post e ENQUANTO tiver ele vai ficar colocando neste espaço, se não tiver mostre o parágrafo No post found. -->
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();

                            get_template_part('parts/articles');

                        endwhile;
                    ?>
                        <!-- fazendo a paginação -->
                        <div class="wpdevs-pagination">
                            <div class="pages new"><?php previous_posts_link(__("<< Newer posts", 'wp-devs')) ?></div>
                            <div class="pages old"><?php next_posts_link(__("Older posts >>", 'wp-devs')) ?></div>
                        </div>
                    <?php


                    else : ?>
                        <p><?php esc_html_e('No post found', 'wp-devs') ?></p>
                    <?php endif; ?>
                </div>
                <!-- chamando o elemento sidebar.php -->
                <?php get_sidebar() ?>
            </div>

        </main>
    </div>
</div>

<?php get_footer() ?>