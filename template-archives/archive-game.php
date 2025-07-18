<?php
  session_start();
	get_template_part('template-parts/head');
	require_once(locate_template('template-parts/module_func.php', true, true));
	get_template_part('template-parts/header');
	$buttonValue = tab_form_value('game');
?>
<main class="l-main p-game">
		<section class="p-fv">
			<h1 class="p-fv-title">GAME</h1>
		</section>
		<?php
			$post_type = get_post_type();

			$args = [
					'breadcrumb_slug_arr' => [],
					'breadcrumb_arr' => ['ゲーム']
			];

			get_template_part('template-parts/breadcrumb', null, $args);
		?>
	<div class="p-articles-head">
		<h2 class="p-articles-title"><span class="p-articles-title-eng">GAME</span><span class="p-articles-title-kana">ゲーム</span></h2>
		<p class="p-articles-lead">話題のゲームやクリエイターにまつわる<br class="u-sp-show">ニュース、インタビュー、コラムなどをお届け</p>
	</div>
	<div class="p-mainContent">
		<section class="c-content">
			<form action="<?= esc_url( home_url('/') );?>game" method="post" class="p-article-header">
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'all' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="all"><span>A</span><span>LL</span></button>
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'news' ?  ' is-tabActive' : ''; echo $tabActive; ?>" class="p-article-tab" type="submit" name="button" value="news"><span>N</span><span>EWS</span></button>
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'interview' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="interview"><span>I</span><span>NTERVIEW</span></button>
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'column' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="column"><span>C</span><span>OLUMN</span></button>
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'report' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="report"><span>R</span><span>EPORT</span></button>
				<button class="p-article-tab<?php $tabActive = $buttonValue == 'another' ?  ' is-tabActive' : ''; echo $tabActive; ?>" type="submit" name="button" value="another"><span>A</span><span>NOTHER</span></button>
			</form>
			<div class="p-articles">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = [];
					if ($buttonValue == "all") {
						$buttonValue = ['news', 'interview', 'column', 'report', 'another'];
					}
					$args = array(
						'post_type' => 'game',
						'posts_per_page' => 15,
						'post_status' => 'publish',
						'paged' => $paged,
						'tax_query' => [
							[
								'taxonomy' => 'category',   // カスタムタクソノミーを指定
								'field'    => 'slug',       // タームの"slug"または"id"を指定
								'terms'    => $buttonValue, // 絞り込みたいタームを指定
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

								if (!is_wp_error($terms) && !empty($terms)) {
									foreach ($terms as $term_name) {
							?>
							<span class="p-article-type-item" style="background-color: black;"><?= convert_jp($term_name); ?></span>
							<?php
									}
								}
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
				<?php get_template_part('template-parts/pagination'); ?><!-- ページネーション -->
			</div>
		</section>
		<?php get_template_part('template-parts/side'); ?><!-- サイド -->
	</div>
	<!-- ./p-mainContent -->
</main>
<?php get_template_part('template-parts/footer') ?>