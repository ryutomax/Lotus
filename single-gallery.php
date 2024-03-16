<?php session_start(); ?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
    if(have_posts()):
    while(have_posts()):
    the_post();
?>
<div class="content">
    <h1><?php the_title(); ?></h1>
    <a href="<?php echo esc_url($_SESSION['post_url']); ?>">記事へ戻る</a>
    <?php the_content(); ?>
</div>
<p class="page_num">
    <?php wp_link_pages(
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

    $post_num = 0 + 1;
    echo 'この記事の画像・動画（' .$post_num. '点）';

    // 画像URLの配列をループして表示
    foreach ($image_urls as $url) {
        echo '<img src="' . $url . '" alt="Post Image">';
        $post_num++;
    }
    function get_images_from_post($post_id) {
        $post = get_post($post_id);
        $post_content = $post->post_content;

        // 画像のURLを抽出するための正規表現パターン
        $pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';

        // 正規表現によるマッチング
        preg_match_all($pattern, $post_content, $matches);

        // $matches[1]には、すべての画像URLが配列として格納される
        $image_urls = $matches[1];

        return $image_urls;
    }
?>
<?php get_template_part('template-parts/footer') ?>
<script>

</script>
