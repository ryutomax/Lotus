<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>

<?php
    $title = get_the_title();
    $post_id = get_the_ID();
    $post_type = '';

    $args = array(
        'post_type' => ['news', 'music', 'game', 'interview', 'animation', 'entertainment'], // カスタム投稿タイプのスラッグを指定
        'posts_per_page' => -1, // 全ての記事を対象にする
        'post_status' => 'publish',
        'post_title' => $title, // 指定したタイトル
    );

    $custom_query = new WP_Query($args);

    // 各記事の情報を取得して処理
    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $post_type = get_post_type(); // 記事の投稿タイプを取得
        }
        wp_reset_postdata();
    } else {
        // 該当する記事がない場合の処理を行う
    }
    $home_url = esc_url(home_url('/'));

    $breadcrumb_args = [
        'breadcrumb_slug_arr' => [$post_type, $title],
        'breadcrumb_arr' => [$post_type, $title, '画像ギャラリー']
    ];

    get_template_part('template-parts/breadcrumb', null, $breadcrumb_args);
?>

<?php
    if(have_posts()):
    while(have_posts()):
    the_post();
?>
<div class="content">
    <h1><?php echo the_title(); ?></h1>
    <?php
        $post = get_page_by_title($title, OBJECT, 'news');
        if ($post) {
            $link = get_permalink($post->ID);
            echo '<a href="' . esc_url($link) . '">記事へ戻る</a>';
        }
    ?>
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

    let currentUrl = window.location.href;
    // let match = currentUrl.match(/(\d+)\/?$/);
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
