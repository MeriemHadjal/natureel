<?php
get_header('sport');
?>
<section id="bien-manger" class="container-fluid">
    <div id="filtre_bien_manger">
        <button class="btn active" onclick="filterSelectionCuisine('all-bien-manger')">all</button>
        <button class="btn" onclick="filterSelectionCuisine('cuisine générale')">general</button>
        <button class="btn" onclick="filterSelectionCuisine('cuisine spécifique')">spécifique</button>
    </div>
    <div class="row">
        <?php

        $post = array(
            'post_type' => 'post',
            'cat' => 2,
            'posts_per_page' => 1,
            'order' => 'DESC', // classé par ordre alphabétique
            'orderby' => 'date_post', // par titre
        );

        $post_query = new WP_Query($post);
        if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();

                ?>



                <div class="bien_manger_article_principal col-8 column <?php $categories = get_the_category();
                                                                                if (!empty($categories)) {
                                                                                    echo esc_html($categories[1]->name);
                                                                                } ?>" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                     <?php
$categories = get_the_category();
 
if ( ! empty( $categories ) ) {
    echo esc_html( $categories[1]->name );   
} ?>
                        <div class="content_title">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <div class="content_trait">
                                <div class="trait_petit"></div>
                                <div class="trait_grand"></div>
                            </div>
                        </div>

                        <div class="extrait">
                            <!--Lien vers l'article en question-->
                            <?php the_excerpt(); ?>
                        </div>
                        <p class="datePost"><?php the_modified_date(); ?></p>
                    </a>
                </div>



        <?php
            endwhile;
        endif;
        ?>

        <div class="col-4 article_bien_manger_lateral pr-0 pl-20">
            <?php

            $post = array(
                'post_type' => 'post',
                'cat' => 2,
                'posts_per_page' => 2,
                'offset' => 1,
                'order' => 'DESC', // classé par ordre alphabétique
                'orderby' => 'date_post', // par titre
            );

            $post_query = new WP_Query($post);
            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) : $post_query->the_post();

                    ?>



                    <div class="bien_manger_article_secondaire column <?php $categories = get_the_category();
                                                                                if (!empty($categories)) {
                                                                                    echo esc_html($categories[1]->name);
                                                                                } ?>" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <?php
                                    $categories = get_the_category();

                                    if (!empty($categories)) {
                                        echo esc_html($categories[1]->name);
                                    } ?>
                            <div class="content_title">
                                <h3 class="title"><?php the_title(); ?></h3>
                                <div class="content_trait">
                                    <div class="trait_petit"></div>
                                    <div class="trait_grand"></div>
                                </div>
                            </div>

                            <div class="extrait">
                                <!--Lien vers l'article en question-->
                                <?php the_excerpt(); ?>
                            </div>
                            <p class="datePost"><?php the_modified_date(); ?></p>
                        </a>
                    </div>



            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>


</section>

<section id="moreCuisine">

    <div class="row somewhere_cuisine a_la_suite_cuisine">

    </div>
</section>
<?php

get_footer('sport');

?>