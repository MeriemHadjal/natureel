<?php

get_header(); ?>

<section id="concept" class="container-fluid">
    <div class="container">
        <div class="content_title">
            <h2 class="title_concept">CONCEPT</h2>
            <div class="content_trait">
                <div class="trait_petit"></div>
                <div class="trait_grand"></div>
            </div>
        </div>
        <div class="content_text row">
            <div class="col-12 offset-md-1 col-md-4 offset-lg-0 col-lg-6">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo fugiat esse in possimus deserunt minus saepe, 
                repellat maiores nostrum aut itaque mollitia delectus ipsum debitis? Nobis aut eligendi dolore? Possimus?
            </p>
            </div>
            <div class="col-12 offset-md-1 col-md-4 offset-lg-0 col-lg-6">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo fugiat esse in possimus deserunt minus saepe, 
                repellat maiores nostrum aut itaque mollitia delectus ipsum debitis? Nobis aut eligendi dolore? Possimus?
            </p>
            </div>
            <div class="col-12">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo fugiat esse in possimus deserunt minus saepe, 
                repellat maiores nostrum aut itaque mollitia delectus ipsum debitis? Nobis aut eligendi dolore? Possimus?
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo fugiat esse in possimus deserunt minus saepe, 
                repellat maiores nostrum aut itaque mollitia delectus ipsum debitis? Nobis aut eligendi dolore? Possimus?
            </p>
            </div>
        </div>
    </div>  
</section>

<section id="last_article" class="container-fluid pr-0 pl-0 allSlider">

<div class="container">
    <div class="content_title">
        <h2 class="title_concept">DERNIERS ARTICLES</h2>
        <div class="content_trait">
            <div class="trait_petit"></div>
            <div class="trait_grand"></div>
        </div>
    </div>

    <div class="row">                     
        <?php
        
        $post = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
        );

        $post_query = new WP_Query($post);
        if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();
            
            ?>

        <article class="col-12 col-md-6">
      <div class="content_title">
  <h3 class="title"><?php the_title();?></h3>
        <div class="content_trait">
            <div class="trait_petit"></div>
            <div class="trait_grand"></div>
        </div>
    </div>
  <div class="thumb">
            <?php the_post_thumbnail(array(350,250)); ?>
            </div>
            <div class="extrait">
<a href="">Voir l'article</a>             
</div>
             <p class="datePost"><?php the_modified_date(); ?></p>
           
       
        </article>

        <?php
            endwhile;
            endif;
            die(); 
        ?>
    </div>



</section>


<?php get_footer()?>