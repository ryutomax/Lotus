<?php
/*
Template Name: About Us
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>

<main class="l-main">
  <section class="p-top-googleAd">
    <div class="p-googleAd-inner"></div>
  </section>
<?php
  $args = [
    'breadcrumb_slug_arr' => [],
    'breadcrumb_arr' => ['About Us']
  ];
  get_template_part('template-parts/breadcrumb', null, $args);
?>
<div class="p-aboutUs">
  <section class="p-aboutUs-top">
    <h2 class="p-aboutUs-top-title">About Us</h2>
    <h3 class="p-aboutUs-top-copy">リアルなクリエイターの声を伝える、マルチライブメディア。<br>次世代の才能が息づく、クリエイティブの発信拠点。<br>ここから紡がれる、開花する、彼らのStory。</h3>
    <p class="p-aboutUs-top-text">
      <span>「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。<br>SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。<br>言葉は広がり、時に魔法をかけるが如く人々の心に響きます。</span>
      <span>「Lotus」は日本語に直訳すると、植物の「蓮」。「蓮」は池の泥水を吸いながらも美しい花を<br>咲かせることができる唯一無二の花で、花言葉は「清らかな心」。</span>
      <span>蓮の花のようなアーティストやクリエイター達の躍動を、情熱を、ありのままの想いと向き合い<br>言葉の力で人々の心に残るコンテンツを国内、そして世界へ発信していきます。<br>それは時にマジカルでエモーショナルな体験となることでしょう。<br>新しいマルチメディアサイトにご期待ください。</span>
    </p>
    <a href="<?php esc_url(home_url('/')); ?>contact" class="p-aboutUs-top-btn">掲載依頼・お問合せ</a>
  </section>
  <section class="p-aboutUs-cont">
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">MUSIC</span><span class="p-aboutUs-sec-title-sub">ミュージック</span></h3>
        <p class="p-aboutUs-sec-text">
          バンドを中心に、J-POPやアイドルなど様々な<br>ジャンルのアーティストを紹介していきます。<br>
          当サイトオリジナルのグッズ販売<br>
          ファンミーティングもあります。
        </p>
        <a href="<?php esc_url(home_url('/')); ?>music" class="p-aboutUs-sec-btn">ミュージックのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_music.png'; ?>" alt="ミュージック" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">ANIME</span><span class="p-aboutUs-sec-title-sub">アニメ</span></h3>
        <p class="p-aboutUs-sec-text">
          次なるトレンドは彼らが描く。若手やアマチュアクリエイターたちのキャッチ―なインタビューがあなたの心を魅了します。<br>
          クリエイターの他、声優、Vtuber他、アニメに携わる様々なアーティストの今の声をお届けします。
        </p>
        <a href="<?php esc_url(home_url('/')); ?>animation" class="p-aboutUs-sec-btn">アニメのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_anime.png'; ?>" alt="アニメ" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">GAME</span><span class="p-aboutUs-sec-title-sub">ゲーム</span></h3>
        <p class="p-aboutUs-sec-text">
          今や世界ゲームコンテンツ市場の規模は実に26兆8005億円。<br>
          益々広がりを見せるゲームの世界で生きるCGクリエイターやゲームプランナー、ゲームプレイヤーなどのインタビューやコラムをワールドワイドな視点でお届けします。
        </p>
        <a href="<?php esc_url(home_url('/')); ?>game" class="p-aboutUs-sec-btn">ゲームのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_game.png'; ?>" alt="ゲーム" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">ENTERTAINMENT</span><span class="p-aboutUs-sec-title-sub">エンタメ</span></h3>
        <p class="p-aboutUs-sec-text">
          エンターテインメントの未来を担うのは、彼らの想い。<br>
          アンダーグラウンドな魂がここに。<br>
          ジャンルを超えたアーティスト、パフォーマー達の情熱と夢を、動画や記事で生き生きと伝えます。
        </p>
        <a href="<?php esc_url(home_url('/')); ?>entertainment" class="p-aboutUs-sec-btn">エンタメのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_entertainment.png'; ?>" alt="エンタメ" class="p-aboutUs-sec-img">
    </div>
  </section>
  <section class="p-aboutUs-bottom">
    <p class="p-aboutUs-bottom-title">For Artist/Creator</p>
    <p class="p-aboutUs-bottom-intro">
      Lotusでは、様々なアーティストの皆様の声を募っています。<br
      >当サイトを通じて、各種イベントやプロモーション活動のお手伝いをいたします。<br>
      皆様からのコンタクトをお待ちしております。
    </p>
    <a href="<?php esc_url(home_url('/')); ?>contact" class="p-aboutUs-bottom-btn">掲載依頼・お問合せ</a>
  </section>
</div>
</main>

<?php get_template_part('template-parts/footer') ?>