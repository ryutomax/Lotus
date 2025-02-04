<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
	require_once(locate_template('template-parts/module_func.php', true, true));

	$title = get_the_title();
	$post_type = get_post_type();
	$page_url = get_permalink();
	$post_id = get_the_ID();

	$terms_name = term_names_by_term($post_id, 'meta-bind', false);
	$tag_terms_name = term_names_by_term($post_id, 'animation-tag', true);

	$home_url = esc_url(home_url('/'));

	$args = [
			'breadcrumb_slug_arr' => [$post_type],
			'breadcrumb_arr' => ['アニメ', $title]
	];
?>
<main class="l-main">
	
	<?php get_template_part('template-parts/breadcrumb', null, $args); ?>
	<div class="p-mainContent">
		<section class="c-content">
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();

				$post_id = get_the_ID();
			?>
			<div class="p-single p-single-anime">
				<span class="p-single-type" style="background-color: #f4538a;">
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
				<img src="<?= esc_url($post_thumbnail); ?>" alt="<?php the_title(); ?>" class="p-single-thumbnail" loading="lazy">
				<?= generate_gallery_link($title); ?>
				<?php include get_template_directory() . '/template-parts/sns_share.php'; ?>

				<div class="p-single-cont">
					<?php the_content(); ?>
					<?php get_template_part('template-parts/pagination'); ?><!-- ページネーション -->
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
						'post_type' => 'animation',
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'tax_query' => [
							[
								'taxonomy' => 'animation-tag',   // カスタムタクソノミーを指定
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
							<img src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" class="p-article-thumbnail" loading="lazy">
						</figure>
						<div class="p-article-info">
							<h2 class="p-article-title"><?php the_title(); ?></h2>
							<div class="p-article-type">
								<?php
									$post_id = get_the_ID(); // 現在の投稿IDを取得
									$terms = wp_get_post_terms($post_id, 'category', array('fields' => 'names'));

									if (!is_wp_error($terms) && !empty($terms)) :
										foreach ($terms as $term_name) :
								?>
									<span class="p-article-type-item" style="background-color: #f4538a;"><?= convert_jp($term_name); ?></span>
								<?php
										endforeach;
									endif;
								?>
							</div>
							<ul class="p-article-tags">
								<li class="p-article-tag"></li>
							</ul>
						</div>
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
		<?php get_template_part('template-parts/side'); ?><!-- サイド -->
	</div>
	<!-- ./p-mainContent -->
</main>
<?php get_template_part('template-parts/footer') ?>