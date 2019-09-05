<?php get_header('new'); ?>
<main id="page_actualites" class="container">

    <div class="row">
        <section class="col-12">
            <h2>Informations importantes</h2>
            <div class="content_actualites offset-2">
                <div class="actualites">
                    <ul>
                        <?php

                        $args = array(
                            'post_type' => 'informations',
                            'showposts' => -1,
                            'order' => 'DESC', // classé par ordre alphabétique 
                            // 'orderby' => 'date_post', // par titre 
                        );

                        $ajax_query = new WP_Query($args);

                        if ($ajax_query->have_posts()) : ?>
                            <?php
                                while ($ajax_query->have_posts()) : $ajax_query->the_post(); 
                                
                        $informations = get_the_category();
                                ?>
                                <li class="informations">
                                    <?php echo the_content(); ?>
                                </li>
                        <?php
                            endwhile;
                        endif ?>
                    </ul>
                </div>
            </div>

        </section>
    </div>

 <!-- EVENT PRESENT -->
    <div class="row">
    <i class="col-1 fas fa-arrow-left"></i>
        <section class="col-10">
            <h2 id="actu">Actualités</h2>
            <div class="content_evenements mr-auto ml-auto d-flex flex-row ">
            
                <div class="slide d-flex justify-content-between">
                    <?php

                    $args = array(
                        'post_type' => 'evenement',
                        'showposts' => -1,
                        'order' => 'DESC', // classé par ordre alphabétique 
                        // 'orderby' => 'date_post', // par titre 
                    );

                    $ajax_query = new WP_Query($args);

                    if ($ajax_query->have_posts()) :

                        while ($ajax_query->have_posts()) : $ajax_query->the_post();

                            $dateEventDebut = get_post_custom($post_id);
                            $dateEventFin = get_post_custom($post_id);
                            // var_dump($dateEventDebut['_dateEventDebut'][0]);
                            // var_dump($dateEventFin['_dateEventFin'][0]);

                            $dateEventDebut = $dateEventDebut['_dateEventDebut'][0];
                            $dateEventFin = $dateEventFin['_dateEventFin'][0];
                            $dateJ = date_i18n('Y-m-d');
                            
                            if (($dateEventDebut <= $dateJ) && ($dateEventFin >= $dateJ)) : ?>
                           

                                <a href="<?php the_permalink() ;?>" class="evenements col-4" style=" background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
                                    
                                    <h3><?php the_title(); ?></h3>
                                    <p> Début <?php echo $dateEventDebut; ?></p>
                                    <p> Fin <?php echo $dateEventFin; ?></p>
                                    <p> Jour J <?php echo $dateJ; ?></p>
                                </a ><?php 
                
                            endif;
                        endwhile;
                    endif; ?>
                </div>
               
            </div>
        </section>
        <i class="col-1 fas fa-arrow-right"></i>
    </div>

    <!-- EVENT PASSEE -->
    <div class="row">

        <section class="col-12">
            <h2>Passé</h2>
            <div class="content_evenements mr-auto ml-auto d-flex flex-row justify-content-between">
                <div class="list-evenements">
                    <?php

                    $args = array(
                        'post_type' => 'evenement',
                        'showposts' => -1,
                        'order' => 'DESC', // classé par ordre alphabétique 
                        // 'orderby' => 'date_post', // par titre 
                    );

                    $ajax_query = new WP_Query($args);

                    if ($ajax_query->have_posts()) :

                        while ($ajax_query->have_posts()) : $ajax_query->the_post();


                            $dateEventDebut = get_post_custom($post_id);
                            $dateEventFin = get_post_custom($post_id);
                            $dateEventDebut = $dateEventDebut['_dateEventDebut'][0];
                            $dateEventFin = $dateEventFin['_dateEventFin'][0];
                            $dateJ = date_i18n('Y-m-d');
                            if ($dateEventFin < $dateJ) : ?>
                                <div class="evenements">
                                    <h3><?php the_title(); ?></h3>
                                    <p> Début <?php echo $dateEventDebut; ?></p>
                                    <p> Fin <?php echo $dateEventFin; ?></p>
                                    <p> Jour J <?php echo $dateJ; ?></p>
                                </div>
                    <?php
                            endif;
                        endwhile;
                    endif ?>
                </div>
            </div>
        </section>
    </div>

    <!-- EVENT FUTUR -->
    <div class="row">

        <section class="col-12">
            <h2>FUTUR</h2>
            <div class="content_evenements mr-auto ml-auto d-flex flex-row justify-content-between">
                <?php

                $args = array(
                    'post_type' => 'evenement',
                    'showposts' => -1,
                    'order' => 'ASC', // classé par ordre alphabétique 
                    // 'orderby' => 'date_post', // par titre 
                );

                $ajax_query = new WP_Query($args);

                if ($ajax_query->have_posts()) :

                    while ($ajax_query->have_posts()) : $ajax_query->the_post();


                        $dateEventDebut = get_post_custom($post_id);
                        $dateEventFin = get_post_custom($post_id);
                        $dateEventDebut = $dateEventDebut['_dateEventDebut'][0];
                        $dateEventFin = $dateEventFin['_dateEventFin'][0];
                        $dateJ = date_i18n('Y-m-d');
                        if (($dateEventDebut > $dateJ) && ($dateEventFin > $dateJ)) : ?>
                            <div class="evenements col-3">

                                <h3><?php the_title(); ?></h3>
                                <p> Début <?php echo $dateEventDebut; ?></p>
                                <p> Fin <?php echo $dateEventFin; ?></p>
                                <p> Jour J <?php echo $dateJ; ?></p>
                            </div>
                <?php
                        endif;
                    endwhile;
                endif; ?>
            </div>
        </section>
    </div>

</main>

<?php get_footer(); ?>