<section class="services">
    <h2><?php esc_html_e('Services', 'wp-devs') ?></h2>
    <div class="container">
        <div class="services-item">
            <?php if (is_active_sidebar('services-1')) {
                dynamic_sidebar('services-1');
            } ?>

        </div>
        <div class="services-item">
            <?php if (is_active_sidebar('services-2')) {
                dynamic_sidebar('services-2');
            } ?>
        </div>
        <div class="services-item">
            <?php if (is_active_sidebar('services-3')) {
                dynamic_sidebar('services-3');
            } ?>
        </div>
    </div>
</section>