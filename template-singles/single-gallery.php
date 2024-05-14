<?php
    get_template_part('template-parts/head');
    get_template_part('template-parts/header');
    require_once(locate_template('template-parts/module_func.php', true, true));

    $title = get_the_title();
    $post_id = get_the_ID();
    $post_slug = get_post_field('post_name', $post_id);
    $post_type = get_post_type_by_title($title)['type'];
    $post_type_jp = convert_jp($post_type);
    $post = get_page_by_title($title, OBJECT, $post_type);
    $single_link = '';
    $single_post_id = '';
    $home_url = esc_url(home_url('/'));

    if ($post) {
        $single_link = get_permalink($post->ID);
        $single_post_id = $post->ID;
    }

    $single_slug = generate_single_slug($title, $post_type);

    $breadcrumb_args = [
        'breadcrumb_slug_arr' => [$post_type, $single_slug],
        'breadcrumb_arr' => [$post_type_jp, $title, '画像ギャラリー']
    ];

	$tag_terms_name[] = term_names_by_term(get_the_terms($single_post_id, "{$post_type}-tag"));
?>
<div class="l-main">
    <section class="p-top-googleAd">
		<div class="p-googleAd-inner"></div>
	</section>
    <?php get_template_part('template-parts/breadcrumb', null, $breadcrumb_args); ?>
    <div class="p-mainContent">
        <section class="p-content">
            <div class="p-gallery">
                <?php if(have_posts()): while(have_posts()): the_post();?>
                    <span class="p-single-type" style="<?= get_post_type_info($post_type)['color']; ?>"><?= get_post_type_info($post_type)['name']; ?></span>
                    <h1 class="p-single-title"><?php the_title(); ?></h1>
                    <time class="p-single-date" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
                    <?php the_content(); ?>
                    <!-- 画像にページ区切りのリンクを付与 -->
                    <?php
                        wp_link_pages(
                            [
                                'before' => '<div id="gallery-page" class="p-gallery-page">' . __(''),
                                'after'  => '</div>',
                                'next_or_number' => 'next',
                                'nextpagelink'     => __('NEXT'),
                                'previouspagelink' => __('PREV'),
                            ]
                        );

                        // custom_wp_link_pages($single_link);
                    ?>
                <?php endwhile; wp_reset_postdata(); endif; ?>
                <?php
                    $image_urls = get_images_from_post($post_id);

                    $gallery_per_page_link = $home_url . 'gallery/' . $post_slug;

                    $post_num = 0;
                    foreach ($image_urls as $url) {
                        $post_num++;
                    }
                    echo '<p class="p-gallery-num">この記事の画像・動画（' .$post_num. '点）</p>';

                    echo '<div class="p-slider-visual">';
                    // 画像URLの配列をループして表示
                    $post_num = 0;
                    foreach ($image_urls as $url) {
                        $post_num++;
                        echo '<a href="'. $gallery_per_page_link . '/' . $post_num .'"><img src="' . $url . '" alt="Post Image"></a>';
                    }
                    echo '</div>';
                ?>
            </div>
            <div class="p-articles">
				<div class="p-articles-related"><h2>関連記事</h2></div>
				<?php
					$args = array(
						'post_type' => $post_type,
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'tax_query' => [
							[
								'taxonomy' => 'game-tag',   // カスタムタクソノミーを指定
								'field'    => 'slug',       // タームの"slug"または"id"を指定
								'terms'    => $tag_terms_name, // 絞り込みたいタームを指定
							]
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
						<h2 class="p-article-title"><?php the_title(); ?></h2>
						<div class="p-article-type">
						<?php
							$post_id = get_the_ID(); // 現在の投稿IDを取得
							$terms = wp_get_post_terms($post_id, 'category', array('fields' => 'names'));

							if (!is_wp_error($terms) && !empty($terms)) :
								foreach ($terms as $term_name) :
						?>
							<span class="p-article-type-item" style="background-color: black;"><?= convert_jp($term_name); ?></span>
						<?php
								endforeach;
							endif;
						?>
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
</div>

<?php get_template_part('template-parts/footer') ?>
<script>

    let currentUrl = window.location.href;
    let match = currentUrl.match(/\/(\d+)\//);
    let lastNumber = 0;
    if (match && match != 1) {
        lastNumber = match[1] - 1;
    }
    $('.p-slider-visual').slick({
        initialSlide: lastNumber, //スライド初期表示 クリックした画像リンクを保存して
        slidesToShow: 2.325,
    });

    document.addEventListener('DOMContentLoaded', () => {
        let galleryPage = document.querySelector('#gallery-page');

        if (galleryPage) {
            let links = galleryPage.querySelectorAll('a');
            let hasNext = false;
            let hasPrev = false;

            // 各リンクのテキストをチェックして、'NEXT'と'PREV'の有無を確認
            links.forEach(function(link) {
                if (link.textContent == 'NEXT') {
                    hasNext = true;
                } else if (link.textContent == 'PREV') {
                    hasPrev = true;
                }
            });
            const articleLink = '<a href="<?= esc_url($single_link) ?>" class="p-gallery-return">記事へ戻る</a>'

            // 条件分岐
            if (hasNext && hasPrev) {
                let htmlContent = galleryPage.innerHTML;
                // "<a"の位置を探す
                let index = htmlContent.indexOf('PREV</a>');
                if (index !== -1) {
                    if (index !== -1) {
                        index += 8;// '</a>'の長さ4を加算
                        htmlContent = htmlContent.slice(0, index) + articleLink + htmlContent.slice(index);
                        // galleryPageのinnerHTMLを更新
                        galleryPage.innerHTML = htmlContent;
                    }
                }
            } else if (hasNext) {
                let htmlContent = galleryPage.innerHTML;
                // "<a"の位置を探す
                let index = htmlContent.indexOf('<a');
                if (index !== -1) {
                    htmlContent = htmlContent.slice(0, index) + articleLink + htmlContent.slice(index);
                    galleryPage.innerHTML = htmlContent;
                }
            } else if (hasPrev) {
                let htmlContent = galleryPage.innerHTML;
                // "<a"の位置を探す
                let index = htmlContent.indexOf('</a>');
                if (index !== -1) {
                    index += 4;// '</a>'の長さ4を加算
                    htmlContent = htmlContent.slice(0, index) + articleLink + htmlContent.slice(index);
                    // galleryPageのinnerHTMLを更新
                    galleryPage.innerHTML = htmlContent;
                }
            }
        }
    });

</script>
