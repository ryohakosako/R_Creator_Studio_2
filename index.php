<?php get_header(); ?>
<main>
    <div class="newullist">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="newlist">
                    <php? ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php echo the_permalink(); ?>">
                                <?php the_post_thumbnail(array(288, 162)); ?></a>

                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no_image.png"></a>
                        <?php endif; ?>
                        <div class="cate-bt">
                            <?php
                            $str = "";
                            foreach ((get_the_category()) as $cat) {
                                echo '<div class="cate-bg"><p>' . $cat->cat_name . '</p></div>';
                            }
                            ?>
                        </div>
                        <h3><a href="<?php echo get_permalink(); ?>">
                                <?php the_title(); ?></a></h3>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
</main>
<?php get_footer(); ?>