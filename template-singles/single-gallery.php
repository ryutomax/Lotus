<?php
    get_template_part('template-parts/head');
    get_template_part('template-parts/header');
    require_once(locate_template('template-parts/module_func.php', true, true));
?>

<?php
    $title = get_the_title();
    $post_id = get_the_ID();
    $post_slug = get_post_field('post_name', $post_id);
    $post_type = get_post_type_by_title($title)['type'];
    $post_type_jp = convert_jp($post_type);
    $post = get_page_by_title($title, OBJECT, $post_type);
    $single_link = '';
    $home_url = esc_url(home_url('/'));

    if ($post) {
        $single_link = get_permalink($post->ID);
    }

    $single_slug = generate_single_slug($title, $post_type);

    $breadcrumb_args = [
        'breadcrumb_slug_arr' => [$post_type, $single_slug],
        'breadcrumb_arr' => [$post_type_jp, $title, '画像ギャラリー']
    ];

    get_template_part('template-parts/breadcrumb', null, $breadcrumb_args);
?>

<?php
    if(have_posts()):
    while(have_posts()):
    the_post();
?>
<div class="content">
    <h1><?php the_title(); ?></h1>
    <a href="<?= esc_url($single_link) ?>">記事へもどる</a>
    <?php the_content(); ?>
    <p class="page_num">
        <!-- 画像にページ区切りのリンクを付与 -->
        <?php
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __(''),
                    'after'  => '</div>',
                    'next_or_number' => 'next',
                    'nextpagelink'     => __('NEXT'),
                    'previouspagelink' => __('PREV'),
                )
            );
        ?>
    </p>
<?php endwhile; endif; ?>
<?php
    $image_urls = get_images_from_post($post_id);

    $gallery_per_page_link = $home_url . 'gallery/' . $post_slug;

    $post_num = 0;
    foreach ($image_urls as $url) {
        $post_num++;
    }
    echo 'この記事の画像・動画（' .$post_num. '点）';

    echo '<div class="visual">';
    // 画像URLの配列をループして表示
    $post_num = 0;
    foreach ($image_urls as $url) {
        $post_num++;
        echo '<a href="'. $gallery_per_page_link . '/' . $post_num .'"><img src="' . $url . '" alt="Post Image"></a>';
    }
    echo '</div>';
?>
<?php get_template_part('template-parts/footer') ?>
<script>

    let currentUrl = window.location.href;
    let match = currentUrl.match(/\/(\d+)\//);
    let lastNumber = 0;
    if (match && match != 1) {
        lastNumber = match[1] - 1;
    }

    $('.visual').slick({
        dots: true,
        initialSlide: lastNumber, //スライド初期表示 クリックした画像リンクを保存して
    });
</script>
