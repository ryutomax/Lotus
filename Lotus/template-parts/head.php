<!DOCTYPE html>
<html lang="ja">
  <?php $description = '「Lotus」は株式会社ディッジ（D.H Inc.）が運営する”クリエイターの言葉を伝える”エンタメ総合メディアです。
    SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。言葉は広がり、時に魔法をかけるが如く人々の心に響きます。'; ?>
  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜Lotus"; ?>
    <?php elseif((is_archive() && ('music' == get_query_var('post_type')))):?>
    <?php $title = "ミュージック｜Lotus"; ?>
    <?php $description = "邦楽、洋楽などのミュージックにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('animation' == get_query_var('post_type'))):?>
    <?php $title = "アニメ｜Lotus"; ?>
    <?php $description = "話題のアニメやVTuberなどにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('game' == get_query_var('post_type'))):?>
    <?php $title = "ゲーム｜Lotus"; ?>
    <?php $description = "話題のゲームやクリエイターにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_archive() && ('entertainment' == get_query_var('post_type'))):?>
    <?php $title = "エンタメ｜Lotus"; ?>
    <?php $description = "ドラマ、映画、俳優、女優、書籍などにまつわるニュース、インタビュー、コラムなどをお届け"; ?>
  <?php elseif(is_page('newslist')) :?>
    <?php $title = "ニュース｜Lotus"; ?>
    <?php $description = "ミュージック、アニメ、ゲーム、エンタメ等の新着ニュースをお届け"; ?>
  <?php elseif(is_single()) :?>
    <?php $title = "Lotus|" . get_the_title(); ?>
    <?php $description = get_the_excerpt(); ?>
    <?php if(is_single() && ('gallery' == get_post_type())) :?>
      <?php $title = "画像ギャラリー｜Lotus"; ?>
    <?php endif; ?>
  <?php elseif(is_page('contact') || is_page('confirm') || is_page('complete')):?>
    <?php $title = "取材申込フォーム｜Lotus"; ?>
  <?php elseif(is_page('information')) :?>
    <?php $title = "運営会社/利用規約/プライバシーポリシー｜Lotus"; ?>
  <?php else:?>
    <?php $title = "Lotus"; ?>
  <?php endif; ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?= esc_attr($description); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/sib3tig.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-16x16.png" sizes="16x16">
    
    <?php $ogp_image = get_template_directory_uri() . '/assets/images/common/OGP632.png'; ?>
    <?php if (is_single()) : ?>
      <?php
        if (has_post_thumbnail()) {
            $ogp_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
      ?>
      <meta property="og:type" content="article">
    <?php else: ?>
      <meta property="og:type" content="website" />
    <?php endif; ?>

    <!--絶対パスで記述-->
    <meta property="og:site_name" content="Lotus|”クリエイターの言葉を伝える”エンタメ総合メディア" />
    <meta property="og:title" content="<?= esc_attr($title); ?>" />
    <meta property="og:url" content="<?= esc_url(get_permalink()); ?> ?>" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:image" content="<?= esc_url($ogp_image); ?>">
    <meta property="og:description" content='<?= esc_attr($description); ?>' />
    
    <!--twitter用-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="<?= esc_url(home_url('')); ?>" />
    <meta name="twitter:title" content="<?= esc_attr($title); ?>" />
    <meta name="twitter:description" content='<?= esc_attr($description); ?>' />
    <meta name="twitter:image:src" content="<?= esc_url($ogp_image); ?>" />

    <title><?= esc_attr($title); ?></title>
    <?php wp_head(); ?>
    <!-- Google Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5155165014369001" crossorigin="anonymous"></script>
  </head>

  <body class="js-load">
