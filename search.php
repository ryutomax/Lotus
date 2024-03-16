<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<div class="search-result">
    <p><?php echo '「'.get_search_query().'」の検索結果：' .$wp_query->found_posts. ' 件の記事が該当しました。';?></p>
</div>

<div class="container">
    <main class="main">
    <?php if (have_posts()): ?>
        <?php while(have_posts()) : the_post();?>
        <div class="contents">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
          <div class="content-date">
            <p>投稿日：<?php echo get_the_date(); ?>投稿時間：<?php the_time(); ?>カテゴリー：<?php the_category(" , "); ?></p>
          </div>
        </div>
       <?php endwhile; ?>

       <?php else: ?>
           <p>該当する記事はありませんでした。</p>
       <?php endif; ?>
    </main>
</div>
<?php get_template_part('template-parts/footer') ?>