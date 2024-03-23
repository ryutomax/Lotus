<?php if(is_single() && ('news' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-news'); ?>

<?php elseif(is_single() && ('gallery' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-gallery'); ?>

<?php endif; ?>