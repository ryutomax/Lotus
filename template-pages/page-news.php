<?php
/*
Template Name: News一覧
*/
?>
<?php
    require_once(locate_template('template-parts/module_func.php', true, true));
    get_template_part('template-parts/head');
    get_template_part('template-parts/header');
?>
<main class="l-main p-news">
    <section class="p-top-googleAd">
        <div class="p-googleAd-inner"></div>
    </section>
    <section class="p-fv">
			<h1 class="p-fv-title">NEWS</h1>
		</section>
		<section class="p-mid-googleAd">
			<div class="p-googleAd-inner"></div>
		</section>
    <?php
        $args = [
            'breadcrumb_slug_arr' => [],
            'breadcrumb_arr' => ['ニュース']
        ];

        get_template_part('template-parts/breadcrumb', null, $args);

        $buttonValue = "all";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 'button'の値を取得
            $buttonValue = $_POST['button'];
        }
    ?>
    <div class="p-articles-head">
        <h2 class="p-articles-title"><span class="p-articles-title-eng">NEWS</span><span class="p-articles-title-kana">ニュース</span></h2>
        <p class="p-articles-lead">ミュージック、アニメ、ゲーム、エンタメ等の新着ニュースをお届け</p>
    </div>
    <div class="p-mainContent">
        <section class="p-content">
            <form action="<?= esc_url( home_url('/') );?>newslist" method="post" class="p-article-header">
                <button class="p-article-tab<?php $tabActive = $buttonValue == 'all' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="all"><span>A</span>LL</button>
                <button class="p-article-tab<?php $tabActive = $buttonValue == 'music' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="music"><span>M</span>USIC</button>
                <button class="p-article-tab<?php $tabActive = $buttonValue == 'game' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="game"><span>G</span>AME</button>
                <button class="p-article-tab<?php $tabActive = $buttonValue == 'animation' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="animation"><span>A</span>NIME</button>
                <button class="p-article-tab<?php $tabActive = $buttonValue == 'entertainment' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="entertainment"><span>E</span>NTERTAINMENT</button>
            </form>
            <div class="p-articles">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if ($buttonValue == "all") {
                        $buttonValue = ['music', 'game', 'animation', 'entertainment'];
                    }
                    $args = array(
                        'post_type' => $buttonValue,
                        'posts_per_page' => 15,
                        'post_status' => 'publish',
                        'paged' => $paged,
                        'tax_query' => [
                            array(
                                'taxonomy' => 'category',   // カスタムタクソノミーを指定
                                'field'    => 'slug',       // タームの"slug"または"id"を指定
                                'terms'    => 'news',       // 絞り込みたいタームを指定
                            )
                        ]
                    );

                    $wp_query = new WP_Query( $args );
                    if ( $wp_query->have_posts() ):
                    while ( $wp_query->have_posts() ):
                        $wp_query->the_post();
                ?>
                <article class="p-article">
                    <a class="p-article-link" href="<?php echo get_the_permalink(); ?>">
                        <time class="p-article-time" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
                        <?php
                            $thumbnail = get_the_post_thumbnail_url();
                            if (!$thumbnail) {
                                $thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
                            }
                        ?>
                        <figure  class="p-article-frame">
                            <img src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" class="p-article-thumbnail">
                        </figure>
                        <!-- カスタム投稿タイプ出力 -->
                        <h2 class="p-article-title"><?php the_title(); ?></h2>
                        <?php $post_type = get_post_type(); ?>
                        <div class="p-article-type">
                            <span class="p-article-type-item" style="<?= get_post_type_info($post_type)['color']; ?>"><?= get_post_type_info($post_type)['name']; ?></span>
                        </div>
                        <ul class="p-article-tags">
                            <li class="p-article-tag"></li>
                        </ul>
                    </a>
                </article>
                <?php endwhile; ?>
                <?php else: ?>
                        <p>該当する記事がありません。</p>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
                <?php get_template_part('template-parts/pagination'); ?><!-- ページネーション -->
            </div>
            <!-- /.p-articles -->
        </section>
        <section class="p-side">
            <div class="p-side01"></div>
            <div class="p-side02"></div>
            <div class="p-side03"></div>
            <div class="p-side04"></div>
            <div class="p-side05"></div>
            <div class="p-side06"></div>
        </section>
    </div>
</main>
<?php get_template_part('template-parts/footer') ?>