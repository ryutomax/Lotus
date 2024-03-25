<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<?php
	$title = get_the_title();
	$post_type = get_post_type();
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
			<?php echo $gallery_link; ?>
			<?php the_content(); ?>
		</div>
		<?php echo $pagination; ?>
	<?php endwhile; endif; ?>
	<!-- 作品情報 -->
	<?php

		$title = get_the_title();
		$post = get_page_by_title($title, OBJECT, 'work-info');
		if ($post):
	?>
	<section class="p-work-info">
		<h2 class="p-work-info-title">作品情報</h2>
		<div class="p-work-info-content">
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</section>
	<?php endif; ?>
	<!-- イベント情報 -->
	<?php

		$title = get_the_title();
		$post = get_page_by_title($title, OBJECT, 'event');
		if ($post):
	?>
	<section class="p-event">
		<h2 class="p-event-title">イベント情報</h2>
		<div class="p-event-content">
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</section>
	<?php endif; ?>
	<!-- プロフィール -->
	<?php

		$title = get_the_title();
		$post = get_page_by_title($title, OBJECT, 'profile');
		if ($post):
	?>
	<section class="p-profile">
		<h2 class="p-profile-title">プロフィール</h2>
		<div class="p-profile-content">
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</section>
	<?php endif; ?>
</div>
<?php get_template_part('template-parts/footer') ?>