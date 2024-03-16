<?php if(is_page('service')):?>

    <?php get_template_part( 'templates-page/page-service', $page->post_name ); ?>

<?php elseif(is_page('store')):?>

    <?php get_template_part( 'templates-page/page-store', $page->post_name ); ?>

<?php elseif(is_page('ma')):?>

    <?php get_template_part( 'templates-page/page-ma', $page->post_name ); ?>

<?php elseif(is_page('event')):?>

    <?php get_template_part( 'templates-page/page-event', $page->post_name ); ?>

<?php elseif(is_page('establish')):?>

    <?php get_template_part( 'templates-page/page-establish', $page->post_name ); ?>

<?php elseif(is_page('contact')):?>

    <?php get_template_part( 'templates-page/page-contact', $page->post_name ); ?>

<?php endif; ?>