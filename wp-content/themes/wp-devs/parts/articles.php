<article>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

    <?php if (has_post_thumbnail()) : ?>
        <!-- imagem de thumb passando o tamanho pelo array/ ou pode definir o tamanho em settings/media -->
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(275, 275)) ?></a>
    <?php endif ?>

    <div class="meta-info">
        <!-- no get precisa do echo antes -->
        <p><?php esc_html_e('Posted in', 'wp-devs') ?> <?php echo esc_html(get_the_date()) ?> by <?php the_author_posts_link() ?></p>

        <?php if (has_category()) : ?>
            <p><?php esc_html_e('Categories', 'wp-devs') ?>: <?php the_category(' ',) ?></p>
        <?php endif ?>

        <?php if (has_tag()) : ?>
            <p><?php esc_html_e('Tags', 'wp-devs') ?>: <?php the_tags('', ',   ') ?></p>
        <?php endif ?>
    </div>
    <!-- pegando o conteúdo do post em si -->
    <?php the_excerpt() ?>
</article>