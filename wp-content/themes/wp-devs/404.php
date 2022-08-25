<?php get_header() ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="siter-main">
            <div class="error-404">
                <div class="container">
                    <header>
                        <!-- e_('string a ser traduzida', texdomain) -->
                        <h1>
                            <?php esc_html_e('Error 404...', 'wp-devs') ?>
                            <br> <?php esc_html_e('Page not found', 'wp-devs') ?>
                        </h1>
                        <p><?php esc_html_e('Unfortunately, the page you tried to readh does not exist on this site.', 'wp-devs') ?></p>
                    </header>

                    <!-- widgets muito interessantes! -->
                    <div class="error">
                        <p><i><?php esc_html_e('How about doind a search?', 'wp-devs') ?></i>
                        </p>
                        <?php get_search_form() ?>

                        <?php the_widget('WP_Widget_Recent_Posts', array(
                            //quando é php puro __(string a ser traduzida)
                            'title' => __('Latest Posts', 'wp-devs'),
                            'number' => 3
                        )); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_footer() ?>