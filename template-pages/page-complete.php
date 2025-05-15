<?php
/*
Template Name: 申込完了
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<main class="l-main">
  <div id="breadcrumb" class="c-breadcrumb">
    <div class="c-breadcrumb-inner">
        <div class="c-breadcrumb-cont">
            <ol class="c-breadcrumb-list">
              <li class="c-breadcrumb-item"><a href="<?= esc_url(home_url('/')) ?>">TOP</a></li>
              <li class="c-breadcrumb-item"><a href="<?= esc_url(home_url('/')) ?>contact">取材申込フォーム</a></li>
              <li class="c-breadcrumb-item">送信完了</li>
            </ol>
        </div>
    </div>
  </div>
  <!-- /.c-breadcrumb -->
  <div class="p-contact">
    <div class="p-contact-head">
      <h3 class="p-contact-head-title">For Artist/Creator</h3>
      <p class="p-contact-head-intro">Lotusでは、様々なアーティストの皆様の声を募っています。<br>当サイトを通じて、各種イベントやプロモーション活動のお手伝いをいたします。<br>皆様からのコンタクトをお待ちしております。</p>
    </div>
    <div class="p-contact-form">
      <?php
        // ここにページの他のコンテンツやテンプレートコードを追加

        // ショートコードを呼び出してフォームを表示
        echo do_shortcode('[mwform_formkey key="130"]');

        // ここにページの他のコンテンツやテンプレートコードを追加
      ?>
      <p class="p-contact-text">取材申込ありがとうございます。<br>内容確認後、担当者よりご回答させて頂きます。</p>
      <a href="<?= esc_url(home_url('/')) ?>" class="p-input-topBack">TOPへ戻る</a>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer') ?>