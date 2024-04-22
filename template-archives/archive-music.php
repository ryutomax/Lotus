<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
	$post_type = get_post_type();

    $args = [
        'breadcrumb_slug_arr' => [],
        'breadcrumb_arr' => [$post_type]
    ];

    get_template_part('template-parts/breadcrumb', null, $args);

    $buttonValue = "all";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $buttonValue = $_POST['button'];
    }
?>

<form action="" method="post" class="p-article-header">
    <button class="p-article-tab" type="submit" name="button" value="all"><span>A</span>LL</button>
    <button class="p-article-tab" class="p-article-tab" type="submit" name="button" value="news"><span>N</span>EWS</button>
    <button class="p-article-tab" type="submit" name="button" value="interview"><span>I</span>NTERVIEW</button>
    <button class="p-article-tab" type="submit" name="button" value="column"><span>C</span>OLUMN</button>
    <button class="p-article-tab" type="submit" name="button" value="report"><span>R</span>EPORT</button>
    <button class="p-article-tab" type="submit" name="button" value="another"><span>A</span>NOTHER</button>
</form>
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [];
    if ($buttonValue == "all") {
        $buttonValue = ['news', 'interview', 'column', 'report', 'another'];
    }
    $args = array(
        'post_type' => 'music',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'paged' => $paged,
        'tax_query' => [
            [
                'taxonomy' => 'category',   // カスタムタクソノミーを指定
                'field'    => 'slug',       // タームの"slug"または"id"を指定
                'terms'    => $buttonValue, // 絞り込みたいタームを指定
            ]
        ]
    );


    $wp_query = new WP_Query( $args );
    if ( $wp_query->have_posts() ):
    while ( $wp_query->have_posts() ):
        $wp_query->the_post();
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

<?php
    endwhile;
    endif;
    wp_reset_postdata();
?>
<div class="p-pagination">
<?php echo paginate_links(
    array (
        'type' => 'list',
        'prev_text' => '＜',
        'next_text' => '＞'
    ));
?>
</div>
<?php get_template_part('template-parts/footer') ?>