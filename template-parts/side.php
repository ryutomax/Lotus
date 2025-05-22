<section class="p-side">
  <div class="p-side-inner">
    <div class="p-side-x">
      <h3>X (Twitter)</h3>
      <blockquote class="twitter-tweet"><p lang="ja" dir="ltr">“クリエイターの言葉を伝える”エンタメ総合メディア「Lotus」始動！アーティストやクリエイターが放つ純粋な言葉の魔法をお届けします。<br><br>ここだけでしか見れない独占インタビューやオリジナル記事も続々登場！<br><br>▼<a href="https://t.co/PrO5UQxDrF">https://t.co/PrO5UQxDrF</a><a href="https://twitter.com/hashtag/Lotus?src=hash&amp;ref_src=twsrc%5Etfw">#Lotus</a></p>&mdash; Lotus編集部 (@lotus_magic_d) <a href="https://twitter.com/lotus_magic_d/status/1774730339279421570?ref_src=twsrc%5Etfw">April 1, 2024</a></blockquote> 
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    
    <?php
      $post_type = get_query_var('post_type');
      $post_now_id = get_query_var('post_id');
      $tag_name = get_query_var('tag_name');
      $tag_terms_name = get_query_var('tag_terms_name');
      $is_single = get_query_var('is_single');

      if ($is_single):
    ?>
    <!-- 関連記事 -->
    <div class="p-articles">
      <div class="p-articles-related"><h3>関連記事</h3></div>
        <?php
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'tax_query' => [
                    [
                        'taxonomy' => $tag_name,   // カスタムタクソノミーを指定
                        'field'    => 'slug',       // タームの"slug"または"id"を指定
                        'terms'    => $tag_terms_name, // 絞り込みたいタームを指定
                    ]
                ],
                'post__not_in' => [$post_now_id]
            );
            $wp_query = new WP_Query( $args );
            if ( $wp_query->have_posts() ): while ( $wp_query->have_posts() ): $wp_query->the_post();
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
                        $terms = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'names'));

                        if (!is_wp_error($terms) && !empty($terms)) :
                            foreach ($terms as $term_name) :
                    ?>
                        <span class="p-article-type-item" style="background-color: black;"><?= convert_jp($term_name); ?></span>
                    <?php
                            endforeach;
                        endif;
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
      <?php endif; wp_reset_postdata(); ?>
    </div>
    <!-- /.p-articles -->
    <?php endif; ?>
  </div>
</section>