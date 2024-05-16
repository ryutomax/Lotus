
<!-- is_single() && ('gallery' == get_post_type()) -->
<?php
  if(is_single() && ('gallery' == get_post_type())) {

    wp_link_pages(
      [
        'before' => '<div id="gallery-page" class="p-gallery-page">' . __(''),
        'after'  => '</div>',
        'next_or_number' => 'next',
        'nextpagelink'     => __('NEXT'),
        'previouspagelink' => __('PREV'),
      ]
    );

  } elseif (is_single() && !('gallery' == get_post_type())) {

    global $page, $numpages;
    if( $numpages > 1 ){ // ページが複数ある場合
        $prev_link = $page > 1 ? _wp_link_page($page - 1) . '＜</a>' : '';
        $next_link = $page < $numpages ? _wp_link_page($page + 1) . '＞</a>' : '';
        echo '<div class="p-pagination">';
        echo '<span class="prev">' . $prev_link . '</span>';
        wp_link_pages( array(
            'before'           => '',
            'after'            => '',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'pagelink'         => '%',
        ) );
        echo '<span class="next">' . $next_link . '</span>';
        echo '</div>';
    }

  } elseif (is_archive() || is_page('news') || is_search()) {

    echo '<div class="p-pagination">';
    echo paginate_links(
    array (
      'type' => 'plain',
      'prev_text' => '＜',
      'next_text' => '＞',
      'end_size'  => 1, // 両端のページ数
      'mid_size'  => 2,
    ));
    echo '</div>';

  }
?>