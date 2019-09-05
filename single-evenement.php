<?php
get_header('article');
?>
<?php if (have_posts()) : while (have_posts()) : the_post();
        $dateEventDebut = get_post_custom($post_id);
        $dateEventFin = get_post_custom($post_id);
        $dateEventDebut = $dateEventDebut['_dateEventDebut'][0];
        $dateEventFin = $dateEventFin['_dateEventFin'][0];
        $dateJ = date_i18n('Y-m-d'); ?>
        <section id="single_post_evenement" class="header-article container-fluid d-flex flex-column justify-content-between pl-0 pr-0" class="last_article col-9" style="background-color: #c3d8bb">
            <div class="container">
                <div class="bg_article">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h2 class="article_title"> <?php the_title();  ?></h2>
                            </div>
                            <div class="article_content d-flex flex-column align-items-center">
                                <?php echo the_content(); ?>
                            </div>
                            <div class="article_evenement d-flex justify-content-around">
                                <?php $dateEventDebut = date_i18n('j m y') ?>
                                <p>Début <?php echo $dateEventDebut; ?></p>
                                <p>Fin <?php echo $dateEventFin; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer('post');
?>