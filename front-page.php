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

<section class="container-fluid pr-0 pl-0 allSlider">
    <?php
    $query = new WP_Query(array(

        'post_type' => 'post',
        'posts_per_page' => 4,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    ));
    ?>
<div class="container">
    <div class="row">
    <?php if ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>

                <?php if ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>

                <?php if ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>

                <?php if ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                <?php endif; ?>
    </div>
</div>



</section>


<?php get_footer()?>