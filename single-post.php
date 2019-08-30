<?php
get_header('article');
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section id="single-post" class="header-article container-fluid d-flex flex-column justify-content-between pl-0 pr-0" class="last_article col-9" style="background-image: linear-gradient(rgba(50,50,50,0.5), rgba(50,50,50,0.5)), url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');min-height: 100vh; max-width: 100%; background-attachment:fixed">
            <div class="container">
                <div class="bg_article">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h2 class="article_title"> <?php the_title();  ?></h2>
                            </div>
                            <div class="article_content">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
?>