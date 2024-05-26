<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜Lotus"; ?>
    <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
  <?php elseif((is_archive() && ('music' == get_query_var('post_type'))) || (is_single() && ('music' == get_post_type()))):?>
    <?php $title = "ミュージック｜Lotus"; ?>
    <?php $description = "邦楽、洋楽などのミュージックにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('animation' == get_query_var('post_type')) || (is_single() && ('animation' == get_post_type()))):?>
    <?php $title = "アニメ｜Lotus"; ?>
    <?php $description = "話題のアニメやVTuberなどにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('game' == get_query_var('post_type')) || (is_single() && ('game' == get_post_type()))):?>
    <?php $title = "ゲーム｜Lotus"; ?>
    <?php $description = "話題のゲームやクリエイターにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('entertainment' == get_query_var('post_type')) || (is_single() && ('entertainment' == get_post_type()))):?>
    <?php $title = "エンタメ｜Lotus"; ?>
    <?php $description = "ドラマ、映画、俳優、女優、書籍などにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_page('newslist')) :?>
    <?php $title = "ニュース｜Lotus"; ?>
    <?php $description = "ミュージック、アニメ、ゲーム、エンタメ等の新着ニュースをお届け"; ?>
  <?php elseif(is_single() && ('gallery' == get_post_type())) :?>
    <?php $title = "画像ギャラリー｜Lotus"; ?>
    <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
  <?php elseif(is_page('contact') || is_page('confirm') || is_page('complete')):?>
    <?php $title = "取材申込フォーム｜Lotus"; ?>
    <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
  <?php elseif(is_page('information')) :?>
    <?php $title = "運営会社/利用規約/プライバシーポリシー｜Lotus"; ?>
    <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
  <?php else:?>
    <?php $title = "Lotus"; ?>
    <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
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
    <!-- Google Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5155165014369001" crossorigin="anonymous"></script>
  </head>

  <body class="js-load">
