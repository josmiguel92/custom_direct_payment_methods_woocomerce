<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
        <div class="digages-woodp-plugin-grid">
            <?php
            // Fetch and display plugins from JSON
            
            $data_url = plugins_url('fetch.json', __FILE__);
            $svgdata = get_option('digages_svg_data_usage');
            if($svgdata == 'yes') 
            {
                $data_url = 'https://digages.com/dp-api-activate/digages-plugin-install.php'; 
            }

            //$json_url = 'https://digages.com/dp-api-activate/digages-plugin-install.php'; // Replace with your JSON U
            $json_url = $data_url; // Replace with your JSON URL
            $response = null; //wp_remote_get($json_url);
            
            if (is_wp_error($response) || empty($response)) {
                echo '<p>Error loading plugins.</p>';
                return;
            }
            
            $plugins = json_decode(wp_remote_retrieve_body($response), true);
            
            if (empty($plugins)) {
                echo '<p>No plugins found.</p>';
                return;
            }
            
            foreach ($plugins as $plugin) {
                $plugin_path = isset($plugin['path']) ? $plugin['path'] : '';
                $plugin_settings = isset($plugin['settings']) ? $plugin['settings'] : '';
                $plugin_settingslink = site_url($plugin_settings);
                $plugin_slug = sanitize_title($plugin['name']);
                $is_installed = digages_woodp_is_plugin_installed($plugin_path);
                $is_active = $is_installed && is_plugin_active($plugin_path);
                ?>
                <div class="digages-woodp-plugin-card">
                    <div class="digages-woodp-plugin-card-item1">
                        <div> 
                            <?php // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?> 
                                <img src="<?php echo esc_url($plugin['image']); ?>" alt="<?php echo esc_attr($plugin['name']); ?>">
                                <?php // phpcs:enable ?>
                        </div>

                        <div>
                        <?php echo esc_html($plugin['name']); ?>
                        </div>

                    </div>

                        
                    <div class="digages-woodp-plugin-card-item2">
                        <div>
                        <?php if ($is_active) { ?>
                                    <a href="<?php echo esc_url($plugin_settingslink); ?>" target="_blank">
                                        <button class="button woodp-deactivate"><i class="bi bi-gear-fill"></i></button>
                                    </a>
                                <?php } elseif ($is_installed) { ?>
                                    <button class="button woodp-activate" data-slug="<?php echo esc_attr($plugin_slug); ?>" data-path="<?php echo esc_attr($plugin_path); ?>"><i class="bi bi-check-circle-fill"></i></button>
                                <?php } else { ?>
                                    <button class="button woodp-install" data-slug="<?php echo esc_attr($plugin_slug); ?>" data-url="<?php echo esc_url($plugin['download_url']); ?>" data-path="<?php echo esc_attr($plugin_path); ?>"><i class="bi bi-download"></i></button>
                                <?php } ?> 
                        </div>
                        <div>
                        <a href="<?php echo esc_url($plugin['learn_more']); ?>" target="_blank">
                                    <button class="button">Learn More</button>
                                </a>
                        </div>

                    </div>
                     
                     
                     
                </div>
                <?php
            }
            ?>
        </div>

