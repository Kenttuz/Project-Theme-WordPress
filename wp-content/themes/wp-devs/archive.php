<!--página para posts filtrador por author, category, tags... -->

<?php get_header() ?>

<!-- imagem de cabeçalho com upload no admin (aparencia) -->
<?php get_template_part('parts/banner-header') ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="siter-main">
            <!-- mostrando o título dinamicamente -->
            <?php the_archive_title('<h1 class="archive-title">', '</h1>') ?>
            <!-- mostrando a descrição da categoria selecionada dinamicamente -->
            <?php the_archive_description('<div class="archive-description">', '</div>') ?>

            <div class="container">
                <div class="archive-items">
                    <!-- área dinâmica, o wp procura se têm post e ENQUANTO tiver ele vai ficar colocando neste espaço, se não tiver mostre o parágrafo No post found. -->
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();

                            get_template_part('parts/articles');


                        endwhile;
                    ?>
                        <!-- fazendo a paginação -->
                        <div class="wpdevs-pagination">
                            <div class="pages new"><?php previous_posts_link(esc_html__("<< Newer posts", 'wp-devs')) ?></div>
                            <div class="pages old"><?php next_posts_link(esc_html__("Older posts >>", 'wp-devs')) ?></div>
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