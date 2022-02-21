<?php

/**
 * Plugin Name: ZAD IslamQA Competitions With Google Forms
 * Description: WordPress plugin built to edit competitions' forms, and winners.
 * Version: 0.1.0
 * Author: ZAD
 * Author URI: https://zadgroup.net
 * License: MIT
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('plugins_loaded', function () {
    $autoload = plugin_dir_path(__FILE__) . 'vendor/autoload.php';

    $dependencies = [
        'Composer autoload files' => is_readable($autoload),
    ];

    $missing_dependencies = array_keys(array_diff($dependencies, array_filter($dependencies)));

    $display_admin_notice = function () use ($missing_dependencies) {
?>
        <div class="notice notice-error">
            <p>The ZAD IslamQA Competitions' core plugin can't be loaded because these dependencies are missing:</p>
            <ul>
                <?php foreach ($missing_dependencies as $missing_dependency) : ?>
                    <li><?php echo esc_html($missing_dependency); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
<?php
    };

    // If dependencies are missing, display admin notice and return early.
    if ($missing_dependencies) {
        add_action('admin_notices', $display_admin_notice);
        add_action('network_admin_notices', $display_admin_notice); // Needed for multisite only.

        return;
    }

    require_once $autoload;

    (new ZAD\IslamQA\Competitions\GoogleForms\ZIQACGF())->run();
});
