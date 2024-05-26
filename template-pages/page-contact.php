<?php
/*
Template Name: 取材申込フォーム
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<main class="l-main">
  <?php
    $args = [
      'breadcrumb_slug_arr' => [],
      'breadcrumb_arr' => ['掲載依頼・お問い合わせ']
    ];
    get_template_part('template-parts/breadcrumb', null, $args);
  ?>

  <div class="p-contact">
    <div class="p-contact-head">
      <h3 class="p-contact-head-title">For Artist/Creator</h3>
      <p class="p-contact-head-intro">Lotusでは、様々なアーティストの<br class="u-sp-show">皆様の声を募っています。<br
        >当サイトを通じて、各種イベントや<br class="u-sp-show">プロモーション活動のお手伝いをいたします。<br>
        皆様からのコンタクトをお待ちしております。
      </p>
    </div>
    <div class="p-contact-form">
      <h2 class="p-contact-form-title">取材申込フォーム</h2>
      <p class="p-contact-form-caption">＊印は必須入力項目です。</p>
      <?php
      // ここにページの他のコンテンツやテンプレートコードを追加

      // ショートコードを呼び出してフォームを表示
      echo do_shortcode('[mwform_formkey key="130"]');

      // ここにページの他のコンテンツやテンプレートコードを追加
      ?>
    </div>
    <!-- /.p-contact-form -->
  </div>
  <?php get_template_part('template-parts/recommend') ?>
</main>
<?php get_template_part('template-parts/footer') ?>

<script>
  <?php if(is_page('contact')): ?>//取材申し込み入力ページのみ処理実施
    const targetBtm = document.getElementById('input-bottom');
    if(targetBtm) {
      targetBtm.classList.add('is-display-block');
    }

    const btmLink = document.getElementById('bottom-link');
    if(btmLink) {
      btmLink.href = "<?= esc_url(home_url('/')) ?>information";
    }

    document.getElementById("datetime-local").type = "datetime-local";
  <?php endif; ?>
</script>