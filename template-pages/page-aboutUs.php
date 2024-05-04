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
    <h3 class="p-aboutUs-top-copy">リアルなクリエイターの声を伝える、マルチライブメディア。<br>次世代の才能が息づく、クリエイティブの発信拠点。<br>ここから紡がれる、開花する、彼らのStory。</h3>
    <p class="p-aboutUs-top-text">
      <span>「Lotus」は株式会社ディッジ（D.H Inc.）が運営する"クリエイターの言葉を伝える”エンタメ総合メディアです。<br>SNSが生活の一部である現代において「言葉」が人を世界を繋げていることは言うまでもありません。<br>言葉は広がり、時に魔法をかけるが如く人々の心に響きます。</span>
      <span>「Lotus」は日本語に直訳すると、植物の「蓮」。「蓮」は池の泥水を吸いながらも美しい花を<br>咲かせることができる唯一無二の花で、花言葉は「清らかな心」。</span>
      <span>蓮の花のようなアーティストやクリエイター達の躍動を、情熱を、ありのままの想いと向き合い<br>言葉の力で人々の心に残るコンテンツを国内、そして世界へ発信していきます。<br>それは時にマジカルでエモーショナルな体験となることでしょう。<br>新しいマルチメディアサイトにご期待ください。</span>
    </p>
    <a href="<?php esc_url(home_url('/')); ?>contact" class="p-aboutUs-top-btn">掲載依頼・お問合せ</a>
  </section>
  <section class="p-aboutUs-sec">
    <div class="p-aboutUs-sec-info">
      <h3 class="p-aboutUs-sec-title"><span></span></h3>
      <p class="p-aboutUs-sec-text"></p>
      <a href="" class="p-aboutUs-sec-btn"></a>
    </div>
    <img src="" alt="" class="p-aboutUs-sec-img">
  </section>
  <section class="p-aboutUs-bottom">
    <p class="p-aboutUs-bottom-head"></p>
    <p class="p-aboutUs-bottom-text"></p>
    <a href="<?php esc_url(home_url('/')); ?>contact" class="p-aboutUs-bottom-btn">掲載依頼・お問合せ</a>
  </section>
</div>
</main>

<?php get_template_part('template-parts/footer') ?>