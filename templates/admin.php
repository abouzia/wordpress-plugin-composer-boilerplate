<div class="wrap">
    <h1>WP Composer Plugin</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Setting</a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tab-1">
            <form method="post" action="options.php">
                <?php
                settings_fields('wp_composer_plugin_settings');
                do_settings_sections('wp_composer');
                submit_button();
                ?>
            </form>
        </div>

        <div class="tab-pane" id="tab-2">
            <h2>Updates</h2>
        </div>

        <div class="tab-pane" id="tab-3">
            <h2>About</h2>
        </div>
    </div>


</div>