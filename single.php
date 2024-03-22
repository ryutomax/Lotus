<?php if(is_single() && ('news' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-news', $page->post_name ); ?>

<?php elseif(is_single() && ('gallery' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-gallery', $page->post_name ); ?>

<?php endif; ?>