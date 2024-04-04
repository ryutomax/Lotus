<?php
    function generate_gallery_link() {

        $gallery_link = "";

        $title = get_the_title();
        $post = get_page_by_title($title, OBJECT, 'gallery');
        if ($post) {
            $link = get_permalink($post->ID);
            $gallery_link = '<a href="' . esc_url($link) . '">画像ギャラリーへ</a>';
        }

        return $gallery_link;
    }

?>
