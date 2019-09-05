<?php
// enqueu chargement script
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts()
{
    wp_enqueue_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('parent-style', '/wp-content/themes/natureel/style.css?v=<?php echo time(); ?>');
    wp_enqueue_style('leaflet_styles', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.css');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
    wp_enqueue_style('font_styles', 'https://cdn.jsdelivr.net/npm/segoe-fonts@1/segoe-fonts.min.css');
    wp_enqueue_style('font_styles_roboto', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');


    wp_enqueue_script('script-bootstrap-1', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), 1.0, true);
    wp_enqueue_script('script-bootstrap-2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), 1.0, true);
    wp_enqueue_script('script-bootstrap-3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), 1.0, true);
    wp_enqueue_script('script-scroll', 'https://unpkg.com/scrollreveal', array(), 1.0, true);
    wp_enqueue_script('script', '/wp-content/themes/natureel/script.js', array('jquery'), 1.0, true);
    wp_enqueue_script('script_1', '/wp-content/themes/natureel/scroll-sport.js', array('jquery'), 1.0, true);
    wp_enqueue_script('script_2', '/wp-content/themes/natureel/scroll-cuisine.js', array('jquery'), 1.0, true);
    wp_enqueue_script('script_3', '/wp-content/themes/natureel/evenement.js', array('jquery'), 1.0, true);
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

//Ajout des images a la une pour les articles de base de wordpress
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size('category-thumb', 300, 9999); //300 pixels wide (and unlimited height)
};

// affichage des posts cuisine
function mon_action_cuisine()
{
    global $post;

    $args = array(
        'post_type' => 'post', // articles 
        'posts_per_page' => 3,
        'cat' => 2,
        'offset' => 3,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );


    $ajax_query = new WP_Query($args);
    if ($ajax_query->have_posts()) :
        while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 show 
            <?php $categories = get_the_category();
                        if (!empty($categories)) {
                            echo esc_html($categories[1]->name);
                        } ?>
" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[1]->name);
                                } ?>
                    <div class="content_head">
                        <div class="content_title">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="content_trait">
                                <div class="trait_petit"></div>
                                <div class="trait_grand"></div>
                            </div>


                        </div>
                    </div>

                    <div class="extrait">
                        <!--Lien vers l'article en question-->
                        <?php the_excerpt(); ?>
                    </div>
                    <p class="datePost"><?php the_modified_date(); ?></p>


                </a>
            </article>
        <?php endwhile;
            endif;
            die();
        }
        add_action('wp_ajax_mon_action_cuisine', 'mon_action_cuisine');
        add_action('wp_ajax_nopriv_mon_action_cuisine', 'mon_action_cuisine');


        // LOAD MORE CUISINE

        function load_more_cuisine()
        {

            global $post;
            $offsetCuisine = $_POST['offset'];

            $args = array(
                'post_type' => 'post', // articles 
                'posts_per_page' => 3,
                'cat' => 2,
                'offset' => 3 + $offsetCuisine,
                'order' => 'DESC', // classé par ordre alphabétique 
                'orderby' => 'date_post', // par titre 
            );

            $ajax_query = new WP_Query($args);
            $categories = get_the_category();
            $test = "";
            if ($ajax_query->have_posts()) :

                while ($ajax_query->have_posts()) : $ajax_query->the_post();
                    ?>

            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 test show column
            <?php $categories = get_the_category();
                        if (!empty($categories)) {
                            echo esc_html($categories[1]->name);
                        } ?>" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[1]->name);
                                } ?>
                    <div class="content_head">
                        <div class="content_title">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="content_trait">
                                <div class="trait_petit"></div>
                                <div class="trait_grand"></div>
                            </div>


                        </div>
                    </div>

                    <div class="extrait">
                        <!--Lien vers l'article en question-->
                        <?php the_excerpt(); ?>
                    </div>
                    <p class="datePost"><?php the_modified_date(); ?></p>


                </a>
            </article>


        <?php
                endwhile;
            endif;
            die();
        }
        add_action('wp_ajax_load_more_cuisine', 'load_more_cuisine');
        add_action('wp_ajax_nopriv_load_more_cuisine', 'load_more_cuisine');



        // affichage des posts sport
        function mon_action_sport()
        {
            global $post;
            //  $param = $_POST['param'];
            //  echo $param;

            // $url = $_SERVER["HTTP_REFERER"];
            // $url = explode("/", $url);

            // $categories = get_the_category();
            // $categorieName = $categories[1]->name;

            $args = array(
                'post_type' => 'post', // articles 
                'posts_per_page' => 3,
                'cat' => 3,
                'offset' => 1,
                'order' => 'DESC', // classé par ordre alphabétique 
                'orderby' => 'date_post', // par titre 
            );

            $ajax_query = new WP_Query($args);

            if ($ajax_query->have_posts()) :
                while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>

            <article class="offset-9 col-3 show column <?php $categories = get_the_category();
                                                                    if (!empty($categories)) {
                                                                        echo esc_html($categories[1]->name);
                                                                    } ?>" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">

                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[1]->name);
                                } ?>
                    <div class="content_head">
                        <div class="content_title">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="content_trait">
                                <div class="trait_petit"></div>
                                <div class="trait_grand"></div>
                            </div>


                        </div>
                    </div>

                    <div class="extrait">
                        <!--Lien vers l'article en question-->
                        <?php the_excerpt(); ?>
                    </div>
                    <p class="datePost"><?php the_modified_date(); ?></p>


                </a>
            </article>
        <?php

                endwhile;
            endif;
            die();
        }
        add_action('wp_ajax_mon_action_sport', 'mon_action_sport');
        add_action('wp_ajax_nopriv_mon_action_sport', 'mon_action_sport');


        // LOAD MORE sport

        function load_more_sport()
        {

            global $post;
            global $ajax_query;
            // $categories = get_the_category();
            // $categorieName = $categories[1]->name;
            $offsetSport = $_POST['offset'];

            // $url = $_SERVER["HTTP_REFERER"];
            // $url = explode("/", $url);

            $args = array(
                'post_type' => 'post', // articles 
                'posts_per_page' => 1,
                'cat' => 3,
                'offset' => 3 + $offsetSport,
                'order' => 'DESC', // classé par ordre alphabétique 
                'orderby' => 'date_post', // par titre 
            );

            $ajax_query = new WP_Query($args);



            if ($ajax_query->have_posts()) :
                while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="offset-9 col-3 show column <?php $categories = get_the_category();
                                                                    if (!empty($categories)) {
                                                                        echo esc_html($categories[1]->name);
                                                                    } ?>" style="padding:30px; margin-bottom:20px; background-size:cover; background-repeat:no-repeat; background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a class="test" href="<?php echo esc_url(get_permalink()); ?>">
                    <?php
                                $categories = get_the_category();

                                if (!empty($categories)) {
                                    echo esc_html($categories[1]->name);
                                } ?>
                    <div class="content_title">
                        <h3 class="title"><?php the_title(); ?></h3>
                        <div class="content_trait">
                            <div class="trait_petit"></div>
                            <!-- <div class="trait_grand"></div> -->
                        </div>
                    </div>

                    <div class="extrait">
                        <!--Lien vers l'article en question-->
                        <?php the_excerpt(); ?>
                    </div>
                    <p class="datePost"><?php the_modified_date(); ?></p>

                </a>
            </article>

        <?php
                // var_dump($categorieName);

                endwhile;
            endif;
            die();
        }
        add_action('wp_ajax_load_more_sport', 'load_more_sport');
        add_action('wp_ajax_nopriv_load_more_sport', 'load_more_sport');

        // PAGE ACTUALITES EVENEMENTS
        function custom_post_type()
        {

            $labels = array(
                'name' => _x('Evènement', 'Post Type General Name', 'evenement'),
                'singular_name' => _x('Post Type', 'Post Type Singular Name', 'evenement'),
                'menu_name' => __('Evènement', 'evenement'),
                'name_admin_bar' => __('Post Type', 'evenement'),
                'archives' => __('Item Archives', 'evenement'),
                'attributes' => __('Item Attributes', 'evenement'),
                'parent_item_colon' => __('Parent Item:', 'evenement'),
                'all_items' => __('Tous les évenements', 'evenement'),
                'add_new_item' => __('Ajouter un évenement', 'evenement'),
                'add_new' => __('Ajouter un évenement', 'evenement'),
                'new_item' => __('New Item', 'evenement'),
                'edit_item' => __('Edit Item', 'evenement'),
                'update_item' => __('Update Item', 'evenement'),
                'view_item' => __('View Item', 'evenement'),
                'view_items' => __('View Items', 'evenement'),
                'search_items' => __('Search Item', 'evenement'),
                'not_found' => __('Not found', 'evenement'),
                'not_found_in_trash' => __('Not found in Trash', 'evenement'),
                'featured_image' => __('Featured Image', 'evenement'),
                'set_featured_image' => __('Set featured image', 'evenement'),
                'remove_featured_image' => __('Remove featured image', 'evenement'),
                'use_featured_image' => __('Use as featured image', 'evenement'),
                'insert_into_item' => __('Insert into item', 'evenement'),
                'uploaded_to_this_item' => __('Uploaded to this item', 'evenement'),
                'items_list' => __('Items list', 'evenement'),
                'items_list_navigation' => __('Items list navigation', 'evenement'),
                'filter_items_list' => __('Filter items list', 'evenement'),
            );
            $args = array(
                'label' => __('Post Type', 'evenement'),
                'description' => __('Post Type Description', 'evenement'),
                'labels' => $labels,
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'show_in_admin_bar' => true,
                'show_in_nav_menus' => true,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                "menu_position" => 5, "menu_icon" => "dashicons-admin-post",
                "supports" => array("title", "editor", "thumbnail", "excerpt"),
                'capability_type' => 'page',
                'show_in_rest' => true,
                'taxonomies' => array('category'),
                'rest_base' => 'evenement_api',
            );
            register_post_type('evenement', $args);
        }


        add_action('init', 'custom_post_type', 0);


// METABOX
add_action('add_meta_boxes', 'initialisation_metaboxes');
function initialisation_metaboxes()
{
    //on utilise la fonction add_metabox() pour initialiser une metabox
    add_meta_box('id_ma_meta', 'Informations événement', 'ma_meta_function', 'evenement', 'side', 'high');
}


function ma_meta_function($post)
{
    // on récupère la valeur actuelle pour la mettre dans le champ
   
    $dateEventDebut = get_post_meta($post->ID, '_dateEventDebut', true);
    $dateEventFin = get_post_meta($post->ID, '_dateEventFin', true);
    
    echo '<label for="dateEventDebut">Début de l\'événement : </label>';
    echo '<input id="dateEventDebut" type="date" name="dateEventDebut" value="' . $dateEventDebut . '" /><br>';

    echo '<label for="dateEventFin">Fin de l\'événement : </label>';
    echo '<input id="dateEventFin" type="date" name="dateEventFin" value="' . $dateEventFin . '" />';
    
}

add_action('save_post', 'save_metaboxes');


function save_metaboxes($post_ID)
{
    
    if (isset($_POST['dateEventDebut'])) {
        update_post_meta(
            $post_ID,
            '_dateEventDebut',
            sanitize_text_field($_POST['dateEventDebut'])
        );
    }

    if (isset($_POST['dateEventFin'])) {
        update_post_meta(
            $post_ID,
            '_dateEventFin',
            sanitize_text_field($_POST['dateEventFin'])
        );
    }
}



 // PAGE ACTUALITES EVENEMENTS
 function custom_post_type_informations()
 {

     $labels = array(
         'name' => _x('Informations', 'Post Type General Name', 'informations'),
         'singular_name' => _x('Post Type', 'Post Type Singular Name', 'informations'),
         'menu_name' => __('Informations', 'informations'),
         'name_admin_bar' => __('Post Type', 'informations'),
         'archives' => __('Item Archives', 'informations'),
         'attributes' => __('Item Attributes', 'informations'),
         'parent_item_colon' => __('Parent Item:', 'informations'),
         'all_items' => __('Tous les informations', 'informations'),
         'add_new_item' => __('Ajouter une information', 'informations'),
         'add_new' => __('Ajouter une information', 'informations'),
         'new_item' => __('New Item', 'informations'),
         'edit_item' => __('Edit Item', 'informations'),
         'update_item' => __('Update Item', 'informations'),
         'view_item' => __('View Item', 'informations'),
         'view_items' => __('View Items', 'informations'),
         'search_items' => __('Search Item', 'informations'),
         'not_found' => __('Not found', 'informations'),
         'not_found_in_trash' => __('Not found in Trash', 'informations'),
         'featured_image' => __('Featured Image', 'informations'),
         'set_featured_image' => __('Set featured image', 'informations'),
         'remove_featured_image' => __('Remove featured image', 'informations'),
         'use_featured_image' => __('Use as featured image', 'informations'),
         'insert_into_item' => __('Insert into item', 'informations'),
         'uploaded_to_this_item' => __('Uploaded to this item', 'informations'),
         'items_list' => __('Items list', 'informations'),
         'items_list_navigation' => __('Items list navigation', 'informations'),
         'filter_items_list' => __('Filter items list', 'informations'),
     );
     $args = array(
         'label' => __('Post Type', 'informations'),
         'description' => __('Post Type Description', 'informations'),
         'labels' => $labels,
         'hierarchical' => false,
         'public' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'menu_position' => 5,
         'show_in_admin_bar' => true,
         'show_in_nav_menus' => true,
         'can_export' => true,
         'has_archive' => true,
         'exclude_from_search' => false,
         'publicly_queryable' => true,
         "menu_position" => 5, "menu_icon" => "dashicons-admin-post",
         "supports" => array("title", "editor", "thumbnail", "excerpt"),
         'capability_type' => 'page',
         'show_in_rest' => true,
         'taxonomies' => array('category'),
         'rest_base' => 'informations_api',
     );
     register_post_type('informations', $args);
 }


 add_action('init', 'custom_post_type_informations', 0);




function mon_action_evenement() {


    // echo $param;

    global $post_id;
	$param = $_POST['param'];
    
    $args = array(
	    'post_type' => 'evenement',
        'showposts' => 1,
        'offset' => 3,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);

    var_dump($ajax_query);
    
    if ($ajax_query->have_posts()) :

        while ($ajax_query->have_posts()) : $ajax_query->the_post();


            $dateEventDebut = get_post_custom($post_id);
            $dateEventFin = get_post_custom($post_id);
            $dateEventDebut = $dateEventDebut['_dateEventDebut'][0];
            $dateEventFin = $dateEventFin['_dateEventFin'][0];
            $dateJ = date_i18n('Y-m-d');
            if (($dateEventDebut > $dateJ) && ($dateEventFin > $dateJ)) : ?>
                <div class="evenements-next col-3">

                    <h3><?php the_title(); ?></h3>
                    <p> Début <?php echo $dateEventDebut; ?></p>
                    <p> Fin <?php echo $dateEventFin; ?></p>
                    <p> Jour J <?php echo $dateJ; ?></p>
                </div>
    <?php
            endif;
        endwhile;
    endif; 

}

add_action( 'wp_ajax_mon_action_evenement', 'mon_action_evenement' );
add_action( 'wp_ajax_nopriv_mon_action_evenement', 'mon_action_evenement' );