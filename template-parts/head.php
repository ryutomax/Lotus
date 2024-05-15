<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif((is_archive() && ('music' == get_query_var('post_type'))) || (is_single() && ('music' == get_post_type()))):?>
    <?php $title = "ミュージック｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_archive() && ('animation' == get_query_var('post_type')) || (is_single() && ('animation' == get_post_type()))):?>
    <?php $title = "アニメ｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_archive() && ('game' == get_query_var('post_type')) || (is_single() && ('game' == get_post_type()))):?>
    <?php $title = "ゲーム｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_archive() && ('entertainment' == get_query_var('post_type')) || (is_single() && ('entertainment' == get_post_type()))):?>
    <?php $title = "エンタメ｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_page('newslist')) :?>
    <?php $title = "ニュース｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = ""; ?>
  <?php elseif(is_single() && ('gallery' == get_post_type())) :?>
    <?php $title = "画像ギャラリー｜Lotus｜株式会社ディッジ"; ?>
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
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/sib3tig.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-16x16.png" sizes="16x16">
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
