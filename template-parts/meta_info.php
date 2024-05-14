<section class="p-meta-info">
  <?php
    $args = array(
      'post_type' => 'meta-info', // カスタム投稿タイプのスラッグを指定
      'posts_per_page' => -1, // 全ての該当する投稿を取得
      'tax_query' => array(
        array(
          'taxonomy' => 'meta-bind',
          'field'    => 'slug',
          'terms'    => $terms_name,
        ),
      ),
    );
    $query = new WP_Query($args);

    if ($query->have_posts()):
      while ($query->have_posts()) :
        $query->the_post();
  ?>
    <div class="p-meta-info-content">
      <?php the_content(); ?>
    </div>
  <?php endwhile;
    wp_reset_postdata();
  endif; ?>
</section>