<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
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
        'breadcrumb_arr' => [$post_type, $title]
    ];

    get_template_part('template-parts/breadcrumb', null, $args);
?>
<div class="l-main">
	
	<?php
		if(have_posts()):
			while(have_posts()):
				the_post();

		$pagination = '<p class="page_num">'.  wp_link_pages(['echo' => 0]) . '</p>';
	?>
		<div class="content">
			<h1><?php the_title(); ?></h1>
			
			<?php get_template_part('template-parts/gallery_link');?>
			<?php $gallery_link = generate_gallery_link(); ?>
			<?php if(isset($gallery_link)): ?>
				<?php echo $gallery_link; ?>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>
		<!-- 次のページへ -->

		<?php echo $pagination; ?>
	<?php endwhile; endif; ?>
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
			wp_reset_postdata(); // グローバルの$postオブジェクトをリセット
		endif; ?>
	</section>

	<div class="p-sns">
		<a class="p-sns-link" href="https://social-plugins.line.me/lineit/share?url=<?php echo $page_url; ?>" target="_blank">
			<img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/sns_instagram_icon.png" alt="<?php the_title(); ?>">
		</a>
		<a class="p-sns-link" href="http://www.facebook.com/share.php?u=<?php echo $page_url; ?>" target="_blank">
			<img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/sns_x_icon.png" alt="<?php the_title(); ?>">
		</a>
		<a class="p-sns-link" href="https://twitter.com/share?url=<?php echo $page_url; ?>" target="_blank">
			<img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/sns_youtube_icon.png" alt="<?php the_title(); ?>">
		</a>
	</div>
</div>
<?php get_template_part('template-parts/footer') ?>