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
wp_enqueue_script('script_navbar','https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), 1.0, true);
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
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}; 

// affichage des posts cuisine
function mon_action_cuisine()
{
    global $post;
    //  $param = $_POST['param'];
    //  echo $param;

    // $url = $_SERVER["HTTP_REFERER"];
    // $url = explode("/", $url);

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
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
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
            global $ajax_query;
            $offsetCuisine = $_POST['offset'];

            // $url = $_SERVER["HTTP_REFERER"];
            // $url = explode("/", $url);

            $args = array(
                'post_type' => 'post', // articles 
                'posts_per_page' => 3,
                'cat' => 2,
                'offset' => $offsetCuisine,
                'order' => 'DESC', // classé par ordre alphabétique 
                'orderby' => 'date_post', // par titre 
            );

            $ajax_query = new WP_Query($args);



            if ($ajax_query->have_posts()) :
                while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>

            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
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
        add_action('wp_ajax_load_more_cuisine', 'load_more_cuisine');
        add_action('wp_ajax_nopriv_load_more_cuisine', 'load_more_cuisine');


        // affichage des posts sport
        function mon_action_sport()
        {
            global $post;
            // $param = $_POST['param'];
            // echo $param;

            // $url = $_SERVER["HTTP_REFERER"];
            // $url = explode("/", $url);

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
            <article class="offset-9 col-3" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
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
        add_action('wp_ajax_mon_action_sport', 'mon_action_sport');
        add_action('wp_ajax_nopriv_mon_action_sport', 'mon_action_sport');


        // LOAD MORE sport

        function load_more_sport()
        {

            global $post;
            global $ajax_query;
            $offsetSport = $_POST['offset'];

            // $url = $_SERVER["HTTP_REFERER"];
            // $url = explode("/", $url);

            $args = array(
                'post_type' => 'post', // articles
                'posts_per_page' => 1,
                'cat' => 3,
                'offset' => $offsetSport,
                'order' => 'DESC', // classé par ordre alphabétique
                'orderby' => 'date_post', // par titre
            );

            $ajax_query = new WP_Query($args);



            if ($ajax_query->have_posts()) :
                while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="offset-9 col-3" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                <a href="<?php echo esc_url(get_permalink()); ?>">
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
add_action('wp_ajax_load_more_sport', 'load_more_sport');
add_action('wp_ajax_nopriv_load_more_sport', 'load_more_sport');
