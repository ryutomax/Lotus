<?php
  get_template_part('template-parts/head');
  require_once(locate_template('template-parts/module_func.php', true, true));
  get_template_part('template-parts/header');
?>
  <main class="l-main">
    <section class="p-top-googleAd">
      <div class="p-googleAd-inner"></div>
    </section>
    <?php
        $br_text = '「'.get_search_query().'」の検索結果';
        $args = [
            'breadcrumb_slug_arr' => [],
            'breadcrumb_arr' => [$br_text]
        ];

        get_template_part('template-parts/breadcrumb', null, $args);

    ?>
    <div class="p-mainContent">
      <section class="p-content">
        <div class="p-search-result">
        <?php
          $i = 0;
          if (have_posts()) {
            while(have_posts()) {
              the_post();
              $i++;
            }
          } else {

          }
          wp_reset_postdata();
        ?>
          <p><?php echo '検索結果：' .$i. ' 件';?></p>
        </div>
        <div class="p-articles">
        <?php if (have_posts()): ?>
          <?php while(have_posts()) : the_post();?>
          <article class="p-article">
            <a class="p-article-link" href="<?php echo get_the_permalink(); ?>">
              <time class="p-article-time" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
              <?php
                $thumbnail = get_the_post_thumbnail_url();
                if (!$thumbnail) {
                  $thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
                }
              ?>
              <img src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" class="p-article-thumbnail">
              <!-- カスタム投稿タイプ出力 -->
              <h2 class="p-article-title"><?php the_title(); ?></h2>
              <?php
                $post_type = get_post_type();
              ?>
              <div class="p-article-type">
                <span class="p-article-type-item" style="<?= get_post_type_info($post_type)['color']; ?>"><?= get_post_type_info($post_type)['name']; ?></span>
              </div>
              <ul class="p-article-tags">
                <li class="p-article-tag"></li>
              </ul>
            </a>
          </article>
          <?php endwhile; ?>
        <?php else: ?>
            <p>該当する記事はありませんでした。</p>
        <?php
          endif;
          wp_reset_postdata();
        ?>
        </div>
      </section>
      <section class="p-side">
        <div class="p-side01"></div>
        <div class="p-side02"></div>
        <div class="p-side03"></div>
        <div class="p-side04"></div>
        <div class="p-side05"></div>
        <div class="p-side06"></div>
      </section>
    </div>
    
    </div>
  </main>
<?php get_template_part('template-parts/footer') ?>