<?php if(is_archive() && ('news' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-news'); ?>

<?php elseif(is_archive() && ('music' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-music'); ?>

<?php elseif(is_archive() && ('animation' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-animation'); ?>

<?php elseif(is_archive() && ('game' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-game'); ?>

<?php elseif(is_archive() && ('entertainment' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-entertainment'); ?>

<?php elseif(is_archive() && ('interview' == get_post_type())):?>

    <?php get_template_part( 'template-archives/archive-interview'); ?>

<?php endif; ?>