<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
	$title = get_the_title();
	$post_type = get_post_type();
	$page_url = get_permalink();

	$post_id = get_the_ID();
	$taxonomy = 'news-bind';
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
			<?php
				$title = get_the_title();
				$post = get_page_by_title($title, OBJECT, 'gallery');
				if ($post) {
					$link = get_permalink($post->ID);
					$gallery_link = '<a href="' . esc_url($link) . '">画像ギャラリーへ</a>';
				}
			?>
			<?php if(isset($gallery_link)): ?>
			<?php echo $gallery_link; ?>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>
		<!-- 次のページへ -->
		
		<?php echo $pagination; ?>
	<?php endwhile; endif; ?>
	<!-- 作品情報 -->
	<section class="p-work-info">
		<h2 class="p-work-info-title">作品情報</h2>
		<?php
			$args = array(
				'post_type' => 'work-info', // カスタム投稿タイプのスラッグを指定
				'posts_per_page' => -1, // 全ての該当する投稿を取得
				'tax_query' => array(
					array(
						'taxonomy' => 'work-info-bind',
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
			<h2><?php the_title(); ?></h2>
			<div class="p-work-info-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile;
			wp_reset_postdata(); // グローバルの$postオブジェクトをリセット
		endif; ?>
	</section>
	<!-- イベント情報 -->
	<section class="p-event">
		<h2 class="p-event-title">イベント情報</h2>
		<?php
			$args = array(
				'post_type' => 'event', // カスタム投稿タイプのスラッグを指定
				'posts_per_page' => -1, // 全ての該当する投稿を取得
				'tax_query' => array(
					array(
						'taxonomy' => 'event-bind',
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
			<h2><?php the_title(); ?></h2>
			<div class="p-event-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile;
			wp_reset_postdata(); // グローバルの$postオブジェクトをリセット
		endif; ?>
	</section>
	<!-- プロフィール -->
	<section class="p-profile">
		<h2 class="p-profile-title">プロフィール</h2>
		<?php
			$args = array(
				'post_type' => 'profile', // カスタム投稿タイプのスラッグを指定
				'posts_per_page' => -1, // 全ての該当する投稿を取得
				'tax_query' => array(
					array(
						'taxonomy' => 'profile-bind',
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
			<h2><?php the_title(); ?></h2>
			<div class="p-profile-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile;
			wp_reset_postdata(); // グローバルの$postオブジェクトをリセット
		endif; ?>
	</section>

	<div class="p-sns">
		<a href="https://social-plugins.line.me/lineit/share?url=<?php echo $page_url; ?>" target="_blank">Line</a>
		<a href="http://www.facebook.com/share.php?u=<?php echo $page_url; ?>" target="_blank">Facebook</a>
		<a href="https://twitter.com/share?url=<?php echo $page_url; ?>" target="_blank">X</a>
	</div>
</div>
<?php get_template_part('template-parts/footer') ?>