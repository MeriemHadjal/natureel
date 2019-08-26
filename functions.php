<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts()
{
    wp_enqueue_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('parent-style', '/wp-content/themes/natureel/style.css?v=<?php echo time(); ?>');
    wp_enqueue_style('leaflet_styles', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.css');
    wp_enqueue_style('font_styles', 'https://cdn.jsdelivr.net/npm/segoe-fonts@1/segoe-fonts.min.css');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css');

    wp_enqueue_script('script-bootstrap-1', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), 1.0, true);
    wp_enqueue_script('script-bootstrap-2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), 1.0, true);
    wp_enqueue_script('script-bootstrap-3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), 1.0, true);
    wp_enqueue_script('script-scroll', 'https://unpkg.com/scrollreveal', array(), 1.0, true);
    wp_enqueue_script('script', '/wp-content/themes/natureel/script.js', array('jquery'), 1.0, true);
    wp_enqueue_script('script_navbar', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), 1.0, true);
    wp_localize_script('script', 'ajaxurl', admin_url('admin-ajax.php'));
    wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.js');

}

##################################### MENU ##################################
function register_my_menu()
{
    register_nav_menus(array('top' => 'Menu principal'));
};

add_action('init', 'register_my_menu');
