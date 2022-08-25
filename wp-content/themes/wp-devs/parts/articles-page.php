<article>
    <header>
        <h1><?php the_title() ?></h1>
    </header>
    <!-- pegando o conteúdo do post em si -->
    <?php the_content() ?>
    <?php wp_link_pages() ?>
</article>