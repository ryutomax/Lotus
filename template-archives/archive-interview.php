<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
    $args = array(
    'post_type' => 'interview',// 投稿タイプを指定
    'posts_per_page' => 10,// 表示する記事数
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