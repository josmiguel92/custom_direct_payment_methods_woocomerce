<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
// phpcs:disable

// Handle AJAX Requests
add_action('wp_ajax_digages_load_page', 'digages_load_page_callback');

function digages_load_page_callback() {
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $page = isset($_GET['digages_page']) ? sanitize_text_field($_GET['digages_page']) : 'home';

    switch ($page) {
        case 'home':
            include_once(plugin_dir_path(__FILE__) . 'step1/setup.php'); //this line adds the wordpress enqueue function

            break;
            case 'interests':
                include_once(plugin_dir_path(__FILE__) . 'step1/interests.php'); //this line adds the wordpress enqueue function 
                break;
        case 'available':
            include_once(plugin_dir_path(__FILE__) . 'step1/available.php'); //this line adds the wordpress enqueue function 
            break;
            case 'addaccountsmain':
                include_once(plugin_dir_path(__FILE__) . 'addaccounts/main.php'); 
                //this line adds the wordpress enqueue function 
                break;
                case 'methods':
                    include_once(plugin_dir_path(__FILE__) . 'step1/methods.php'); //this line adds the wordpress enqueue function 
                    break;
                    case 'success':
                        include_once(plugin_dir_path(__FILE__) . 'step1/success.php'); //this line adds the wordpress enqueue function 
                        break;
                        case 'license':
                            include_once(plugin_dir_path(__FILE__) . 'step1/license.php'); //this line adds the wordpress enqueue function 
                            break;
            
        case 'services':
            echo "<h2>Our Services</h2><p>We offer various services.</p>
                  <p><a href='#' data-page='home'>Back to Home</a></p>";
            break;
        case 'contact':
            echo "<h2>Contact Us</h2><p>Reach out to us anytime.</p>
                  <p><a href='#' data-page='home'>Back to Home</a></p>";
            break;
        default:
            echo "<h2>Page Not Found</h2><p>The requested page does not exist.</p>";
            break;
    }

    wp_die();
}

// phpcs:enable
?>