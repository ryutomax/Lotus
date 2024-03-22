<?php session_start(); ?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
    if(have_posts()):
    while(have_posts()):
    the_post();
?>
<div class="content">
    <h1><?php echo the_title(); ?></h1>
    <a href="<?php echo esc_url($_SESSION['post_url']); ?>">記事へ戻る</a>
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
    $post_id = get_the_ID(); // 例として投稿ID 1 を使用
    $image_urls = get_images_from_post($post_id);
    $home_url = esc_url(home_url('/'));
    $title = get_the_title();

    $gallery_per_page_link = $home_url . 'gallery/' . $title;

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
    // ========================================
    // 投稿から画像データ取得 HTMLタグとして出力
    // ========================================
    function get_images_from_post($post_id) {
        $post = get_post($post_id);
        $post_content = $post->post_content;
        $pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';

        // 正規表現によるマッチング
        preg_match_all($pattern, $post_content, $matches);
        $image_urls = $matches[1];

        return $image_urls;
    }
?>
<?php get_template_part('template-parts/footer') ?>
<script>
    <?php 
        $lastNumber = "";
        $now_gallery_page_link = get_the_permalink();
        if (preg_match("/\/(\d+)\/?$/", $now_gallery_page_link, $matches)) {
            $lastNumber = $matches[1];
        }
    ?>

    $('.visual').slick({
        dots: true,
        initialSlide: <?php $lastNumber ?>, //スライド初期表示 クリックした画像リンクを保存して
    });
</script>
