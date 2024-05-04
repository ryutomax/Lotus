<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php get_template_part('template-parts/module_func');?>
<?php
	$title = get_the_title();
	$post_type = get_post_type();
	$page_url = get_permalink();

	$post_id = get_the_ID();
	$taxonomy = 'music-bind';
	$terms = get_the_terms($post_id, $taxonomy);
	$terms_name = "";
	if (!empty($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$terms_name = $term->name;
		}
	} else {
		echo 'この投稿には指定されたタクソノミーのタームがありません。';
	}

    $home_url = esc_url(home_url('/'));

    $args = [
        'breadcrumb_slug_arr' => [$post_type],
        'breadcrumb_arr' => ['ミュージック', $title]
    ];
?>
<div class="l-main">
	<?php get_template_part('template-parts/breadcrumb', null, $args); ?>
	<div class="p-mainContent">
		<section class="p-content p-single-music">
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();

				$post_id = get_the_ID();
			?>
				<div class="p-single">
					<span class="p-single-type" style="background-color: #59d5e0;">
					<?php
						$terms = wp_get_post_terms($post_id, 'category', array('fields' => 'names'));
						if (!is_wp_error($terms) && !empty($terms)) {
							foreach ($terms as $term_name) {
								echo convert_jp($term_name);
							}
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
					<?php

					?>
					<?php $gallery_link = generate_gallery_link(); ?>
					<?php if(isset($gallery_link)): ?>
						<?php echo $gallery_link; ?>
					<?php endif; ?>

					<?php the_content(); ?>
				<!-- 次のページへ -->

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
			<?php endwhile;
				wp_reset_postdata();
			endif; ?>
			</div>
			<!-- /.p-single -->
			<!-- 作品情報 -->
			<section class="p-meta-info">
				<?php
					$args = array(
						'post_type' => 'meta-info', // カスタム投稿タイプのスラッグを指定
						'posts_per_page' => -1, // 全ての該当する投稿を取得
						'tax_query' => array(
							array(
								'taxonomy' => 'meta-info-bind',
								'field'    => 'slug',
								'terms'    => $terms_name,
							),
						),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()):
						while ($query->have_posts()) :
							$query->the_post();
				?>
					<div class="p-meta-info-content">
						<?php the_content(); ?>
					</div>
				<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</section>
			<div class="p-sns">
				<a class="p-sns-link" href="http://www.facebook.com/share.php?u=<?php echo $page_url; ?>" target="_blank">
					<img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/sns_x_icon.png" alt="<?php the_title(); ?>">
				</a>
			</div>
		</section>
		<section class="p-side"></section>
	</div>
	<!-- ./p-mainContent -->
</div>
<?php get_template_part('template-parts/footer') ?>