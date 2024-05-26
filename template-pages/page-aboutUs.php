<?php
/*
Template Name: About Us
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>

<main class="l-main">
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
    <h3 class="p-aboutUs-top-copy">リアルなクリエイターの声を伝える、<br class="u-sp-show">マルチライブメディア。<br>次世代の才能が息づく、<br class="u-sp-show">クリエイティブの発信拠点。<br>ここから紡がれる、開花する、<br class="u-sp-show">彼らのStory。</h3>
    <p class="p-aboutUs-top-text">
      <span>「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。<br>SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。<br>言葉は広がり、時に魔法をかけるが如く人々の心に響きます。</span>
      <span>「Lotus」は日本語に直訳すると、植物の「蓮」。「蓮」は池の泥水を吸いながらも美しい花を<br class="u-sp-none">咲かせることができる唯一無二の花で、花言葉は「清らかな心」。</span>
      <span>蓮の花のようなアーティストやクリエイター達の躍動を、情熱を、ありのままの想いと向き合い<br class="u-sp-none">言葉の力で人々の心に残るコンテンツを国内、そして世界へ発信していきます。<br>それは時にマジカルでエモーショナルな体験となることでしょう。<br>新しいマルチメディアサイトにご期待ください。</span>
    </p>
    <a href="<?= esc_url(home_url('/')); ?>contact" class="p-aboutUs-top-btn">掲載依頼・お問合せ</a>
  </section>
  <section class="p-aboutUs-cont">
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">MUSIC</span><span class="p-aboutUs-sec-title-sub">ミュージック</span></h3>
        <p class="p-aboutUs-sec-text">
          バンドを中心に、J-POPやアイドルなど様々な<br>ジャンルのアーティストを紹介していきます。<br>
          当サイトオリジナルのグッズ販売や<br>
          ファンミーティングもあります。
        </p>
        <a href="<?= esc_url(home_url('/')); ?>music" class="p-aboutUs-sec-btn">ミュージックのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_music.png'; ?>" alt="ミュージック" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">ANIME</span><span class="p-aboutUs-sec-title-sub">アニメ</span></h3>
        <p class="p-aboutUs-sec-text">
          次なるトレンドは彼らが描く。<br class="u-sp-show">若手やアマチュアクリエイターたちの<br class="u-sp-show">キャッチ―なインタビューが<br class="u-sp-m-show">あなたの心を魅了します。<br>
          クリエイターの他、声優、Vtuber他、<br class="u-sp-show">アニメに携わる様々なアーティストの<br class="u-sp-show">今の声をお届けします。
        </p>
        <a href="<?= esc_url(home_url('/')); ?>animation" class="p-aboutUs-sec-btn">アニメのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_anime.png'; ?>" alt="アニメ" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">GAME</span><span class="p-aboutUs-sec-title-sub">ゲーム</span></h3>
        <p class="p-aboutUs-sec-text">
          今や世界ゲームコンテンツ市場の規模は<br class="u-sp-show">実に26兆8005億円。<br>
          益々広がりを見せるゲームの世界で生きる<br class="u-sp-show">CGクリエイターやゲームプランナー、<br class="u-sp-show">ゲームプレイヤーなどの<br class="u-sp-m-show">インタビューやコラムを<br class="u-sp-show">ワールドワイドな視点でお届けします。
        </p>
        <a href="<?= esc_url(home_url('/')); ?>game" class="p-aboutUs-sec-btn">ゲームのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_game.png'; ?>" alt="ゲーム" class="p-aboutUs-sec-img">
    </div>
    <div class="p-aboutUs-sec">
      <div class="p-aboutUs-sec-info">
        <h3 class="p-aboutUs-sec-title"><span class="p-aboutUs-sec-title-main">ENTERTAINMENT</span><span class="p-aboutUs-sec-title-sub u-sp-none">エンタメ</span><span class="p-aboutUs-sec-title-sub u-sp-show">エンターテインメント</span></h3>
        <p class="p-aboutUs-sec-text">
          エンターテインメントの未来を担うのは、<br class="u-sp-m-show">彼らの想い。<br>
          アンダーグラウンドな魂がここに。<br>
          ジャンルを超えたアーティスト、<br class="u-sp-m-show">パフォーマー達の情熱と夢を、<br class="u-sp-show">動画や記事で生き生きと伝えます。
        </p>
        <a href="<?= esc_url(home_url('/')); ?>entertainment" class="p-aboutUs-sec-btn">エンタメのページへ</a>
      </div>
      <img src="<?= esc_url(get_template_directory_uri() . '/'). 'assets/images/about_us/about_us_entertainment.png'; ?>" alt="エンタメ" class="p-aboutUs-sec-img">
    </div>
  </section>
  <section class="p-aboutUs-bottom">
    <p class="p-aboutUs-bottom-title">For Artist/Creator</p>
    <p class="p-aboutUs-bottom-intro">
      Lotusでは、様々なアーティストの<br class="u-sp-show">皆様の声を募っています。<br
      >当サイトを通じて、各種イベントや<br class="u-sp-show">プロモーション活動のお手伝いをいたします。<br>
      皆様からのコンタクトをお待ちしております。
    </p>
    <a href="<?= esc_url(home_url('/')); ?>contact" class="p-aboutUs-bottom-btn">掲載依頼・お問合せ</a>
  </section>
</div>
</main>

<?php get_template_part('template-parts/footer') ?>