<?php session_start(); ?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>


<div>
<?php
	if(have_posts()):
		while(have_posts()):
			the_post();

	$pagination = '<p class="page_num">'.  wp_link_pages(['echo' => 0]) . '</p>';
?>
	<div class="content">
		<h1><?php the_title(); ?></h1>
        <?php
			$_SESSION['post_url'] = get_permalink();
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
<?php get_template_part('template-parts/footer') ?>