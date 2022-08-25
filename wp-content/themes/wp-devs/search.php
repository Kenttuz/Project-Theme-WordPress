<?php get_header() ?>;

<div id="primary">
    <div id="main">
        <div class="container">

            <h1><?php esc_html_e('Search results for:', 'wp-devs') ?> <?php echo get_search_query() ?></h1>
            <?php

            //Chamando novamente o form no topo da página
            get_search_form();

            while (have_posts()) :
                the_post();

                get_template_part('parts/content-search');

            endwhile;
            //paginação numérica direta em php / clicando na função pode ver quais configurações passar no array(não é obrigatório)
            the_posts_pagination(array(
                'prev_text'          => _x('Anterior', 'previous set of posts'),
                'next_text'          => _x('Próximo', 'next set of posts'),
            ));
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>