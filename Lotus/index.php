<?php
  get_template_part('template-parts/head');
  require_once(locate_template('template-parts/module_func.php', true, true));
  get_template_part('template-parts/header');
?>
    <main class="l-main p-top">
      <section class="p-top-slider">
        <?php
          $args = array(
              'posts_per_page' => 6,
              'post_status' => 'publish',
              'tax_query' => [
                [
                    'taxonomy' => 'top_carousel',   // カスタムタクソノミーを指定
                    'field'    => 'slug',       // タームの"slug"または"id"を指定
                    'terms'    => ['1', '2', '3', '4', '5', '6'], // 絞り込みたいタームを指定
                ]
              ]
          );

          $carousel_query = new WP_Query( $args );

          if ($carousel_query->have_posts()):
            foreach ($carousel_query->posts as $post) {
                // タームを取得
                $terms = get_the_terms($post->ID, 'top_carousel');
                if ($terms && !is_wp_error($terms)) {
                    // タームの名前、または必要なプロパティを追加
                    $post->top_carousel = $terms;
                } else {
                    // タームがない場合は、空の配列やデフォルト値を設定
                    $post->top_carousel = '';
                }
            }
        endif;
        wp_reset_postdata();

        usort($carousel_query->posts, function($a, $b) {
          $terms_a = get_the_terms($a->ID, 'top_carousel');
          $terms_b = get_the_terms($b->ID, 'top_carousel');
          
          if (!$terms_a || is_wp_error($terms_a)) {
              return -1;
          }
          if (!$terms_b || is_wp_error($terms_b)) {
              return 1;
          }
          $term_name_a = $terms_a[0]->name;
          $term_name_b = $terms_b[0]->name;
          
          return strcmp($term_name_a, $term_name_b);
        });
        // 並び替えた投稿を表示
        foreach ($carousel_query->posts as $post):
            setup_postdata($post);
        ?>

        <div class="p-top-slider-item">
          <a href="<?php echo get_the_permalink(); ?>" class="p-top-slider-link">
            <?php
              $thumbnail = get_the_post_thumbnail_url();
              if (!$thumbnail) {
                $thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
              }
            ?>
            <img class="p-top-slider-img" src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" loading="lazy">
            <div class="p-top-slider-info">
              <?php
                $post_type = get_post_type();
              ?>
              <span class="p-top-slider-tag" style="<?= get_post_type_info($post_type)['color']; ?>"><?= get_post_type_info($post_type)['name']; ?></span>
              <h2 class="p-top-slider-title"><?php the_title(); ?></h2>
            </div>
          </a>
        </div>

        <?php 
        // endwhile; endif;
            endforeach;
          wp_reset_postdata();
        ?>
      </section>
      
      <div class="p-mainContent">
        <section class="c-content">
          <!-- ピックアップニュース -->
          <div class="p-pickUp">
            <h2 class="p-pickUp-title">Pick Up News</h2>
            <div class="p-pickUp-list">
              <?php
                $args = array(
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'tax_query' => [
                        array(
                            'taxonomy' => 'pick_up_news',   // カスタムタクソノミーを指定
                            'field'    => 'slug',       // タームの"slug"または"id"を指定
                            'terms'    => 'is_display', // 絞り込みたいタームを指定
                        )
                    ]
                );

                $carousel_query = new WP_Query( $args );
                  if ( $carousel_query->have_posts() ):
                  while ( $carousel_query->have_posts() ):
                      $carousel_query->the_post();
              ?>
                <article class="p-pickUp-article">
                  <a class="p-pickUp-article-link" href="<?php echo get_the_permalink(); ?>">
                    <?php
                      $thumbnail = get_the_post_thumbnail_url();
                      if (!$thumbnail) {
                        $thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
                      }
                    ?>
                    <img class="p-pickUp-article-thumbnail" src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" loading="lazy">
                    <time class="p-pickUp-article-time" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
                    <div class="p-article-type">
                      <span class="p-article-type-item" style="<?= get_post_type_info(get_post_type())['color']; ?>"><?= get_post_type_info(get_post_type())['name']; ?></span>
                    </div>
                    <h2 class="p-pickUp-article-text"><?php the_title(); ?></h2>
                  </a>
                </article>
              <?php
                endwhile;
                endif;
                wp_reset_postdata();
              ?>
            </div>
          </div>
          <!-- 記事一覧 -->
          <div class="p-articles">
            <?php
                $article_count = 1;
                $query = new WP_Query( array(
                    'post_type' => ['music', 'game', 'animation', 'entertainment'],
                    'posts_per_page' => 30,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                // 表示記事数取得
                $article_num = $query->found_posts;

                  if ( $query->have_posts() ):
                  while ( $query->have_posts() ):
                      $query->the_post();
              ?>
              <?php if($article_count <= 15): ?>
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
                      <!-- ./p-article-type -->
                      <ul class="p-article-tags">
                        <li class="p-article-tag"></li>
                      </ul>
                    </div>
                  </a>
                </article>
              <?php else: ?>
                <?php if ($article_count == 16): ?>
                  <div class="p-article-blind" id="blind-area">
                <?php endif; ?>
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
              <?php endif; ?>
              <?php
                $article_count++;
                endwhile;
                endif;
                wp_reset_postdata();
              ?>
              <!-- 最後の記事でタグを閉じる 記事カウント件数＝表示記事数-->
              <?php if ($article_count == $article_num + 1): ?>
                </div>
                <!-- p-article-blind -->
              <?php endif; ?>
          </div>
          <!-- ./p-articles -->
          <!-- 15件以下で非表示 -->
          <?php if($article_count > 16) : ?>
            <div class="p-articles-bottom">
              <button class="p-articles-more" id="add-more">もっと見る</button>
            </div>
            <?php endif; ?>
        </section>
        <?php get_template_part('template-parts/side'); ?><!-- サイド -->
      </div>
    </main>
    <?php get_template_part('template-parts/footer') ?>
    <script>
      $('.p-top-slider').slick({
        dots: true,
        slidesToShow: 2.325,
        responsive: [
          {
            breakpoint: 768, // OOpx以下のサイズに適用
            settings: {
            slidesToShow: 1,
            }
          }
        ]
      });
      $('.p-pickUp-list').slick({
        dots: true,
        slidesToShow: 3.68,
        responsive: [
          {
            breakpoint: 768, // OOpx以下のサイズに適用
            settings: {
            slidesToShow: 2.68,
            }
          },
          {
            breakpoint: 520, // OOpx以下のサイズに適用
            settings: {
            slidesToShow: 1.68,
            }
          }
        ]
      });
      $('#add-more').click(function() {
        $('#blind-area').addClass('is-more-show');
        $(this).css('display', 'none')
      });
    </script>