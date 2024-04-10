<?php
/*
Template Name: News一覧
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>

<?php
// POSTされたデータがある場合、どのボタンがクリックされたかを表示
    $buttonValue = "all";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 'button'の値を取得
        $buttonValue = $_POST['button'];
    }
?>


<form action="" method="post">
    <button type="submit" name="button" value="all">all</button>
    <button type="submit" name="button" value="music">music</button>
    <button type="submit" name="button" value="game">game</button>
    <button type="submit" name="button" value="animation">anime</button>
    <button type="submit" name="button" value="entertainment">entertainment</button>
</form>

<?php

    if ($buttonValue == "all") {
        $buttonValue = ['music', 'game', 'animation', 'entertainment'];
    }
    $args = array(
        'post_type' => $buttonValue,
        'posts_per_page' => 15,
        'tax_query' => [
            array(
                'taxonomy' => 'category',   // カスタムタクソノミーを指定
                'field'    => 'slug',       // タームの"slug"または"id"を指定
                'terms'    => 'news', // 絞り込みたいタームを指定
            )
        ]
    );

    $news_query = new WP_Query( $args );
    if ( $news_query->have_posts() ):
    while ( $news_query->have_posts() ):
        $news_query->the_post();
?>


<article class="news-item">
    <a href="<?php the_permalink(); ?>" class="news-item__inner">
    <div class="news-item__media js-img-bg">
        <img src="<?php print $thumbnail; ?>" alt="">
    </div>
    <div class="news-item__body">
        <h2 class="news-item__title"><?php the_title(); ?></h2>
        <time datetime="the_time( 'Y-m-d' )"><?php the_time( 'Y.m.d' ); ?></time>
    </div>
    </a>
</article>

<?php endwhile;
    endif;
    wp_reset_postdata();
?>
<?php get_template_part('template-parts/footer') ?>