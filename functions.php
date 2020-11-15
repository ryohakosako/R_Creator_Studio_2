<?php
function creator_studio_setup()
{
    add_theme_support('post-thumbnails'); //アイキャッチ画像をON
    set_post_thumbnail_size(320, 180, true); //50px X 50pxの切り出し
}
add_action('after_setup_theme', 'creator_studio_setup');
?>
<?php
//wordpressのcssを読み込まず自作のcssを適用
add_action('wp_enqueque_scripts', 'remove_block_library_style');
function remove_block_library_style()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
?>
<?php
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'works'; //任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);
?>
<?php
function the_pagenation()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo '<page class="pagination">';
    echo paginate_links(array(
        'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        'format' => '',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<', //
        'next_text' => '>',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3,
    ));
    echo '</page>';
}
?>
<?php
function change_posts_per_page($query)
{
    if (is_admin() || ! $query->is_main_query())
        return;

    if ($query->is_home()) {
        $query->set('posts_per_page', '12');//メインページの時
    }
    if ($query->is_archive()) {
        $query->set('posts_per_page', '9');//アーカイブページの時
    }
    
}
add_action( 'pre_get_posts', 'change_posts_per_page' );
?>

