<?php get_template_part('template-parts/head') ?>
  <div class="l-wrap">
    <!-- 閉じタグは_footer.ejs -->
    <?php get_template_part('template-parts/header') ?>
    <?php get_template_part('template-parts/contactIcon') ?>
      <main class="l-main p-top">
        <section class="p-top-googleAd">
          <div class="p-googleAd-inner"></div>
        </section>
        <section class="p-top-slider">
        <?php
          $args = array(
              'posts_per_page' => 6,
              'post_status' => 'publish',
              'tax_query' => [
                  array(
                      'taxonomy' => 'post_locate',   // カスタムタクソノミーを指定
                      'field'    => 'slug',       // タームの"slug"または"id"を指定
                      'terms'    => 'carousel', // 絞り込みたいタームを指定
                  )
              ]
          );

          $carousel_query = new WP_Query( $args );
            if ( $carousel_query->have_posts() ):
            while ( $carousel_query->have_posts() ):
                $carousel_query->the_post();
          ?>

          <div class="p-top-slider-item">
            <a href="" class="p-top-slider-link">
              <?php
                $thumbnail = get_the_post_thumbnail_url();
                if (!$thumbnail) {
                  $thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
                }
              ?>
              <img class="p-top-slider-img" src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>">
              <div class="p-top-slider-info">
                <?php
                  $post_type = get_post_type();
                  switch ($post_type) {
                    case 'music':
                        $bgc = 'background-color: #59d5e0;';
                        break;
                    case 'game':
                        $bgc = 'background-color: #9195f6;';
                        break;
                    case 'animation':
                        $bgc = 'background-color: #f4538a;';
                        break;
                    case 'entertainment':
                        $bgc = 'background-color: #faa300;';
                        break;
                  }
                  $post_type_object = get_post_type_object($post_type);
                ?>
                <span class="p-top-slider-tag" style="<?= $bgc; ?>"><?php echo esc_html($post_type_object->labels->name); ?></span>
                <h2 class="p-top-slider-title"><?php the_title(); ?></h2>
              </div>
            </a>
          </div>

          <?php endwhile;
            endif;
            wp_reset_postdata();
          ?>
        </section>
        <section class="p-mid-googleAd">
          <div class="p-googleAd-inner"></div>
        </section>
        <div class="p-topContent">
          <section class="p-content">

            <div class="p-pickUp">
              <h2 class="p-pickUp-title">Pick Up News</h2>
              <div class="p-pickUp-list">
                <?php
                  $args = array(
                      'posts_per_page' => 4,
                      'post_status' => 'publish',
                      'tax_query' => [
                          array(
                              'taxonomy' => 'post_locate',   // カスタムタクソノミーを指定
                              'field'    => 'slug',       // タームの"slug"または"id"を指定
                              'terms'    => 'pick-up-news', // 絞り込みたいタームを指定
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
                    <img class="p-pickUp-article-thumbnail" src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>">
                    <time class="p-pickUp-article-time" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
                    <?php
                      $content = get_the_content();
                      $content = strip_tags($content);
                      if (mb_strlen($content) > 40) {
                          $content = mb_substr($content, 0, 40) . '...'; // 40文字を超える場合は「...」を追加
                      }
                    ?>
                    <p class="p-pickUp-article-text"><?php echo $content; ?></p>
                  </a>
                </article>

                <?php endwhile;
                  endif;
                  wp_reset_postdata();
                ?>
              </div>
            </div>
            <div class="p-articles">
              <?php
                  $args = array(
                      'post_type' => ['music', 'game', 'animation', 'entertainment'],
                      'posts_per_page' => 30,
                      'post_status' => 'publish',
                  );

                  $query = new WP_Query( $args );
                    if ( $query->have_posts() ):
                    while ( $query->have_posts() ):
                        $query->the_post();
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
                    <img src="<?php print $thumbnail; ?>" alt="<?php the_title(); ?>" class="p-article-thumbnail">
                    <!-- カスタム投稿タイプ　出力 -->
                    <h2 class="p-article-title"><?php the_title(); ?></h2>
                    <?php
                      $post_type = get_post_type();
                      switch ($post_type) {
                        case 'music':
                            $bgc = 'background-color: #59d5e0;';
                            break;
                        case 'game':
                            $bgc = 'background-color: #9195f6;';
                            break;
                        case 'animation':
                            $bgc = 'background-color: #f4538a;';
                            break;
                        case 'entertainment':
                            $bgc = 'background-color: #faa300;';
                            break;
                      }
                      $post_type_object = get_post_type_object($post_type);
                    ?>
                    <span class="p-top-slider-tag" style="<?= $bgc; ?>"><?php echo esc_html($post_type_object->labels->name); ?></span>
                    <ul class="p-article-tags">
                      <li class="p-article-tag"></li>
                    </ul>
                  </a>
                </article>
                <?php endwhile;
                  endif;
                  wp_reset_postdata();
                ?>
              <div class="p-articles-bottom">
                <button class="p-articles-more" id="add-more">もっと見る</button>
              </div>
            </div>
          </section>
          <section class="p-side"></section>
        </div>
      </main>
      <?php get_template_part('template-parts/footer') ?>
      <script>
        $('.p-top-slider').slick({
          dots: true,
          slidesToShow: 2.325,
        });
        // $('.p-pickUp-list').slick({
        //   dots: true,
        //   slidesToShow: 4,
        // });
      </script>
