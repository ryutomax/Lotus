<?php
  get_template_part('template-parts/head');
  require_once(locate_template('template-parts/module_func.php', true, true));
  get_template_part('template-parts/header');
?>
  <main class="l-main">
    <?php
        $br_text = '「'.get_search_query().'」の検索結果';
        $args = [
            'breadcrumb_slug_arr' => [],
            'breadcrumb_arr' => [$br_text]
        ];
        get_template_part('template-parts/breadcrumb', null, $args);
    ?>
    <div class="p-mainContent">
      <section class="c-content">
        <div class="p-search-result">
          <p><?php echo '検索結果：' .$wp_query -> found_posts. ' 件';?></p>
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
              <figure  class="p-article-frame">
                <img src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" class="p-article-thumbnail" loading="lazy">
              </figure>
              <div class="p-article-info">
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
              </div>
            </a>
          </article>
          <?php endwhile; ?>
        <?php else: ?>
            <p>該当する記事はありませんでした。</p>
        <?php
          endif;
          wp_reset_postdata();
        ?>
        <?php get_template_part('template-parts/pagination'); ?><!-- ページネーション -->
        </div>
      </section>
      <?php get_template_part('template-parts/side'); ?><!-- サイド -->
    </div>
    </div>
  </main>
<?php get_template_part('template-parts/footer') ?>