<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "私たちは自社の海外進出で会得したノウハウ、コネクションを活かし、主にアジアを中心とした邦人の海外進出サポート事業を行っています。"; ?>
  <?php elseif(is_page('contact')) :?>
    <?php $title = "お問い合わせ（資料請求）｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "私たちは自社の海外進出で会得したノウハウ、コネクションを活かし、主にアジアを中心とした邦人の海外進出サポート事業を行っています。"; ?>
  <?php elseif(is_page('complete')) :?>
    <?php $title = "送信完了｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "私たちは自社の海外進出で会得したノウハウ、コネクションを活かし、主にアジアを中心とした邦人の海外進出サポート事業を行っています。"; ?>
  <?php elseif(is_page('service')) :?>
    <?php $title = "サポート内容｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "ASEANの経済成長が続いており、加盟国の半数で1人当たりのGDPが3000ドルを超え、個人消費の拡大が期待されている。特に自動車や家電製品などの耐久消費財の需要が高まり、「コト消費」も増加する見通しです。さらに、ASEAN全体の人口は6億人に達しており、2030年には7億人を超えると予想されています。これにより、域内へのビジネス参入の機会を狙う企業も増えています。"; ?>
  <?php elseif(is_page('establish')) :?>
    <?php $title = "海外法人設立｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "台湾やベトナムなどの東南アジア諸国では急速な経済成長が進み、CGや動画制作の需要も増えています。支社を設立することで市場に直接進出し、競合他社との競争力を高めています。現地の文化やニーズを理解し、地域固有の要素を取り入れた魅力的なコンテンツを制作するために、現地のクリエイティブな才能と協力しています。また、海外クライアントとのコミュニケーションやサポート体制の強化により、課題を解決し、より迅速かつ効果的なサービス提供を実現しています。"; ?>
  <?php elseif(is_page('store')) :?>
    <?php $title = "海外出店｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "ASEANは高い経済成長が続き、1人当たりのGDPが3000ドルを超え、個人消費が拡大予想されます。耐久消費財の需要が高まり、「コト消費」も増加する見通しです。魅力的な点は人口増加で、2030年には7億人を超えると予測されています。多くの企業がこの需要に着目し、参入機会を模索しています。日本食ブームの影響で日本のラーメン店は地域で強力なブランド力を発揮し、クロスカルチャーな食文化の融合による新しい味覚体験や観光客の魅力的な食の体験が期待されます。地域の消費者を取り込み、大きな利益を得るチャンスとなるでしょう。"; ?>
  <?php elseif(is_page('ma')) :?>
    <?php $title = "M&A | Lotus｜株式会社ディッジ"; ?>
    <?php $description = "M&Aは企業の市場シェアを拡大し、新たな地域や顧客層に進出する有効な手段です。しかし、後継者不在の問題により多くの企業が倒産の危機に直面しています。そこで、当社は後継者不在の解決や新たなビジネス領域への挑戦をサポートするため、積極的な姿勢でM&Aを活用し、お客様の成長を支援しています。"; ?>
  <?php elseif(is_page('event')) :?>
    <?php $title = "海外イベント出展｜Lotus｜株式会社ディッジ"; ?>
    <?php $description = "日本の技術は世界的に注目され、海外の展示会で高い人気と評価を受けています。コロナ禍の落ち着きにより、多くの展示会やイベントが増えています。しかし、日本企業が海外展示会に出展しても成果を上げられない場合もあります。だからこそ、専門のサポート会社にアウトソーシングすることが重要な戦略です。当社の専門知識を活用して最適な展示会戦略を立案し、ターゲット市場での注目度を高めます。現地のネットワークと連携して地域のニーズやトレンドを把握し、成功に向けた情報を提供します。"; ?>
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

  <body class="">
