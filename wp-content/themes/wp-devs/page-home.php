<?php get_header() ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="siter-main">

            <?php
            $hero_height = get_theme_mod('set_hero_height', 800);

            $hero_background = wp_get_attachment_image_url(get_theme_mod('set_hero_background',))
            ?>
            <section class="hero" style="background-image: url('http://wp-devs.local/wp-content/uploads/2022/08/wallpaperflare.com_wallpaper-21.jpg');">

                <div class="overlay" style="min-height: <?php echo  $hero_height ?>px;">

                    <div class="container">
                        <div class="hero-items">
                            <h1><?php echo get_theme_mod('set_hero_title', __('Title Here', 'wp-devs')) ?></h1>

                            <p><?php echo nl2br(get_theme_mod('set_hero_subtitle', __('Subitle Here', 'wp-devs'))) ?></p>

                            <a href="<?php echo get_theme_mod('set_hero_button_link', '#') ?>"><?php echo get_theme_mod('set_hero_button_text', __('Learn More', 'wp-devs')) ?></a>
                        </div>
                    </div>
                </div>

            </section>

            <?php get_template_part('parts/services-home') ?>

            <?php get_template_part('parts/latest-news-home'); ?>

        </main>
    </div>
</div>

<?php get_footer() ?>