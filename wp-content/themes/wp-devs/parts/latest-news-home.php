<section class="home-blog">
    <h2><?php esc_html_e('Latest News', 'wp-devs') ?></h2>
    <div class="container">
        <!-- área dinâmica, o wp procura se têm post e ENQUANTO tiver ele vai ficar colocando neste espaço, se não tiver mostre o parágrafo No post found. -->
        <?php
        $per_page = get_theme_mod('set_per_page', 3);
        $post_include = get_theme_mod('set_post_include');
        $post_exclude = get_theme_mod('set_post_exclude');

        //passando para args um array de configuração (loop personalizado) / tipo do post, quantos posts por página e id das categorias
        $args = array(
            'post-type' => 'post',
            'posts_per_page' => $per_page,
            //explode transforma em um array a string (separador ',', de onde vem as informações)
            'post__in' => explode(',', $post_include),
            'post__not_in' => explode(
                ',',
                $post_exclude
            )
        );

        //Instanciando o wp query e passando a var args para o postlist
        $postlist = new WP_Query($args);

        if ($postlist->have_posts()) :
            while ($postlist->have_posts()) : $postlist->the_post(); ?>

                <article class="latest-news">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
                    <?php endif ?>

                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

                    <div class="meta-info">
                        <!-- no get precisa do echo antes -->
                        <p><?php esc_html_e('By', 'wp-devs') ?> <span><?php the_author_posts_link() ?></span>
                        </p>

                        <?php if (has_category()) : ?>
                            <p><?php esc_html_e('Categories', 'wp-devs') ?>: <?php the_category(' ',) ?></p>
                        <?php endif ?>

                        <?php if (has_tag()) : ?>
                            <p><?php _e('Tags', 'wp-devs') ?>: <?php the_tags('', ',   ') ?></p>
                        <?php endif ?>

                        <p>
                            <span><?php echo esc_html(get_the_date()) ?></span>
                        </p>
                    </div>
                    <!-- pegando o RESUMO do post em si -->
                    <?php the_excerpt() ?>
                </article>

            <?php
            endwhile;
            wp_reset_postdata();

        else : ?>
            <p><?php _e('No post found', 'wp-devs') ?></p>
        <?php endif; ?>

    </div>
</section>