<?php if(is_archive() && ('music' == get_query_var('post_type'))):?>

    <?php get_template_part( 'template-archives/archive-music'); ?>

<?php elseif(is_archive() && ('archive-animation' == get_query_var('post_type'))):?>

    <?php get_template_part( 'template-archives/archive-animation'); ?>

<?php elseif(is_archive() && ('game' == get_query_var('post_type'))):?>

    <?php get_template_part( 'template-archives/archive-game'); ?>

<?php elseif(is_archive() && ('entertainment' == get_query_var('post_type'))):?>

    <?php get_template_part( 'template-archives/archive-entertainment'); ?>

<?php endif; ?>