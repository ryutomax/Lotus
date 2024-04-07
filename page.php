<?php if(is_page('news')):?>

    <?php get_template_part( 'templates-page/page-news'); ?>

<?php elseif(is_page('contact')):?>

    <?php get_template_part( 'templates-page/page-contact'); ?>

<?php endif; ?>