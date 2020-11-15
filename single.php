<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/single.css">

<main>
    <section>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <section class=singlepage>
                    <?php the_content(); ?>
                </section>
        <?php endwhile;
        endif; ?>
    </section>
</main>

<?php get_footer(); ?>