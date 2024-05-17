<?php
/*
Template Name: 運営会社/利用規約/プライバシーポリシー
*/
?>
<?php
  get_template_part('template-parts/head');
  get_template_part('template-parts/header');

  $args = [
    'breadcrumb_slug_arr' => [],
    'breadcrumb_arr' => ['運営会社/利用規約/プライバシーポリシー']
  ];
?>
<main class="l-main">
  <section class="p-top-googleAd">
		<div class="p-googleAd-inner"></div>
	</section>
	<?php get_template_part('template-parts/breadcrumb', null, $args); ?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <section class="p-info">
    <h3 class="p-info-title">Site Policy</h3>
    <?php the_content(); ?>
  </section>
  <?php endwhile; wp_reset_postdata(); endif; ?>
</main>
<?php get_template_part('template-parts/footer') ?>
