<div class ="wrap">
    <h1>WP Composer Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('wp_composer_options_group');
            do_settings_sections('wp_composer');
            submit_button();
        ?>
    </form>
</div>