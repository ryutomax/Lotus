<?php if(is_single() && ('music' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-music'); ?>

<?php elseif(is_single() && ('game' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-game'); ?>

<?php elseif(is_single() && ('anime' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-anime'); ?>

<?php elseif(is_single() && ('entertainment' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-entertainment'); ?>

<?php elseif(is_single() && ('gallery' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-gallery'); ?>

<?php endif; ?>