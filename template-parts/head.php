<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_page('contact')) :?>
    <?php $title = "お問い合わせ（資料請求）｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php endif; ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?= $description ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&family=Noto+Serif+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--favicon-->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/apple-touch-icon.png"> -->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-16x16.png" sizes="16x16">
    <!-- <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/safari-pinned-tab.svg" color="#5bbad5"> -->
    <!--絶対パスで記述-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $title ?>" />
    <meta property="og:locale" content="ja_JP" />
    <meta name="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/OGP.jpg">
    <!--twitter用-->
    <meta name="twitter:card" content="summary_large_image" /><!-- summary summary_large_image photo gallery appから選ぶ -->
    <!-- <meta name="twitter:site" content="" /> -->
    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:url" content="https://twitter.com/" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/OGP.jpg" />
    <!--絶対パスで記述-->
    <title><?= $title ?></title>
    <?php wp_head(); ?>
  </head>

  <body class="js-load">
