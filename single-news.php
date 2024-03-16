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
			$link = get_permalink($post->ID);
        ?>
        <!-- <a href="<?php echo esc_url($link); ?>">画像ギャラリーへ</a> -->
		<?php the_content(); ?>
	</div>
	<?php echo $pagination; ?>
<?php endwhile; endif; ?>
<?php
	// 投稿の内容を取得
	$content = get_the_content();

	// DOMDocumentクラスを利用してHTMLをロード
	$dom = new DOMDocument();
	@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

	// 特定のクラスを持つ要素をXPathで検索
	$finder = new DomXPath($dom);
	$classname="wp-block-group";
	$nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

	// 該当する要素のみ出力
	foreach ($nodes as $node) {
		echo $dom->saveHTML($node);
	}
?>
</div>
<?php get_template_part('template-parts/footer') ?>