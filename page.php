<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/page.css">

<main>
    <section>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <h1><?php the_title(); ?></h1>
                <section class="page">
                    <?php the_content(); ?>
                </section>
        <?php
            endwhile;
        endif;
        ?>
    </section>
</main>