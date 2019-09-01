<?php get_header('sport');?>
    
<section id="sport" class="container-fluid pl-0 pr-0">
<div id="filtre_sport_nature">
  <button class="btn active" onclick="filterSelection('all-sport-nature')">all</button>
  <button class="btn" onclick="filterSelection('sport général')">general</button>
  <button class="btn" onclick="filterSelection('sport spécifique')">spécifique</button>
</div>

    <div class="row ml-0 mr-0">

    <?php
        
        $post = array(
        'post_type' => 'post',
        'cat' => 3,
        'posts_per_page' => 1,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
        );

        $post_query = new WP_Query($post);
        if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();           
            ?>

         <div class="last_article col-9 column <?php $categories = get_the_category(); if ( ! empty( $categories ) ) {echo esc_html( $categories[1]->name );} ?>" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
         <a href="<?php echo esc_url( get_permalink() ); ?>">
         <div class="content_head">
         <?php
$categories = get_the_category();
 
if ( ! empty( $categories ) ) {
    echo esc_html( $categories[1]->name );   
} ?>
<div class="content_title">
  <h3 class="title"><?php the_title();?></h3>
        <div class="content_trait">
            <div class="trait_petit"></div>
            <div class="trait_grand"></div>
        </div>
        

    </div>
    <p class="datePost"><?php the_modified_date(); ?></p>
         </div>

            <div class="extrait">
                <!--Lien vers l'article en question-->
                <?php the_excerpt(); ?>
</div>
             
           
             </a>
           
</div>   


<?php endwhile;
      endif;  ?>



    </div>

    <div class="row somewhere_sport a_la_suite_sport">
        
    </div>
</section>


<?php get_footer('sport');?>

