<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
	require_once(locate_template('template-parts/module_func.php', true, true));

	$title = get_the_title();
	$post_type = get_post_type();
	$page_url = get_permalink();
	$post_id = get_the_ID();
	$terms = get_the_terms($post_id, 'meta-bind');
	$terms_name = "";
	if (!empty($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$terms_name = $term->name;
		}
	}
	$tag_terms = get_the_terms($post_id, 'entertainment-tag');
	$tag_terms_name = [];
	if (!empty($tag_terms) && !is_wp_error($tag_terms)) {
		foreach ($tag_terms as $tag_term) {
			$tag_terms_name[] = $tag_term -> name;
		}
	}

    $home_url = esc_url(home_url('/'));

    $args = [
        'breadcrumb_slug_arr' => [$post_type],
        'breadcrumb_arr' => ['エンタメ', $title]
    ];
?>
<div class="l-main">
	<section class="p-top-googleAd">
		<div class="p-googleAd-inner"></div>
	</section>
	<?php get_template_part('template-parts/breadcrumb', null, $args); ?>
	<div class="p-mainContent">
		<section class="p-content p-single-entertainment">
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();

				$post_id = get_the_ID();
			?>
			<div class="p-single">
				<span class="p-single-type" style="background-color: #FAA300;">
					<?php
						$terms = wp_get_post_terms($post_id, 'category', array('fields' => 'names'));
						if (!is_wp_error($terms) && !empty($terms)) {
							echo convert_jp($terms[0]);
						}
					?>
				</span>
				<h1 class="p-single-title"><?php the_title(); ?></h1>
				<time class="p-single-date" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
				<?php
					$post_thumbnail = get_the_post_thumbnail_url($post_id);
					if (!$post_thumbnail) {
						$post_thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
					}
				?>
				<img src="<?= esc_url($post_thumbnail); ?>" alt="<?php the_title(); ?>" class="p-single-thumbnail">
				<?php $gallery_link = generate_gallery_link(); ?>
				<?php if(isset($gallery_link)): ?>
					<?php echo $gallery_link; ?>
				<?php endif; ?>
				<?php include get_template_directory() . '/template-parts/sns_share.php'; ?>

				<div class="p-single-cont">
					<?php the_content(); ?>
					<?php
						global $page, $numpages;
						if( $numpages > 1 ){ // ページが複数ある場合
								$prev_link = $page > 1 ? _wp_link_page($page - 1) . '＜</a>' : '';
								$next_link = $page < $numpages ? _wp_link_page($page + 1) . '＞</a>' : '';
								echo '<div class="p-pagination">';
								echo '<span class="prev">' . $prev_link . '</span>';
								wp_link_pages( array(
										'before'           => '',
										'after'            => '',
										'link_before'      => '<span>',
										'link_after'       => '</span>',
										'next_or_number'   => 'number',
										'separator'        => ' ',
										'pagelink'         => '%',
								) );
								echo '<span class="next">' . $next_link . '</span>';
								echo '</div>';
						}
					?>
					<?php include get_template_directory() . '/template-parts/sns_share.php'; ?>
				</div>
				<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
				<!-- 作品情報 -->
				<?php include get_template_directory() . '/template-parts/meta_info.php'; ?>
			</div>
			<!-- /.p-single -->
			<div class="p-articles">
				<div class="p-articles-related"><h2>関連記事</h2></div>
				<?php
					$args = array(
						'post_type' => 'entertainment',
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'tax_query' => [
							[
								'taxonomy' => 'entertainment-tag',   // カスタムタクソノミーを指定
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
							<span class="p-article-type-item" style="background-color: #FAA300;"><?= convert_jp($term_name); ?></span>
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
	<!-- ./p-mainContent -->
</div>
<?php get_template_part('template-parts/footer') ?>