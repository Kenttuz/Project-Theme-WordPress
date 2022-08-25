<?php get_header() ?>;

<div id="primary">
    <div id="main">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('parts/content-single');
            ?>

                <!-- fazendo a paginação -->
                <div class="wpdevs-pagination">
                    <div class="pages next">
                        <!-- os parametros para indicar a direção da seta e qual ordem do link com a seta -->
                        <?php next_post_link('&laquo; %link') ?>
                    </div>
                    <div class="pages previous">
                        <?php previous_post_link('%link &raquo;') ?>
                    </div>
                </div>
            <?php
                //Formulario de comentários
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>