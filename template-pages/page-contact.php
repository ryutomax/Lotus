<?php
/*
Template Name: お問い合わせ（資料請求）
*/
?>
  <?php get_template_part('template-parts/head') ?>
    <div class="l-wrap">
      <!-- 閉じタグは_footer.ejs -->
        <?php get_template_part('template-parts/header') ?>
          <main class="l-main">
            <section class="p-mv"  style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/home/mv/home_mv_bg.png);">
              <div class="p-mv-inner">
                <h2 class="p-mv-ttl-other">Contact</h2>
                <h3 class="p-mv-ttl-sub">お問い合わせ</h3>
              </div>
              <!-- /.p-mv-inner -->
            </section>
            <div class="p-breadcrumbs">
              <a href="<?= esc_url(home_url('/')) ?>">TOP</a>
              <span>＞</span>
              <span>お問い合わせ（資料請求）</span>
            </div>
            <!-- /.p-breadcrumbs -->
            <div class="wp-block-group has-global-padding is-layout-constrained">
              <h1 style="margin-bottom:var(--wp--preset--spacing--40);" class="wp-block-post-title">お問い合わせ（資料請求）</h1>
            </div>

            <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
              <div class="p-formHead">
                <p class="p-formHead-top">ご訪問ありがとうございます。<br>お見積りのご要望やご不明な点等<br class="u-tb-show">お気軽にご連絡ください。<br>内容確認後、担当者よりご回答させて頂きます。<br><span>「※」マークのある項目は必須項目となります。</span></p>
                <p class="p-formHead-bottom">内容をご確認の上、<br class="u-tb-show">「送信する」ボタンを押してください。</p>
              </div>

              <?php
              // ここにページの他のコンテンツやテンプレートコードを追加

              // ショートコードを呼び出してフォームを表示
              echo do_shortcode('[mwform_formkey key="5"]');

              // ここにページの他のコンテンツやテンプレートコードを追加
              ?>
              </div>
            <?php get_template_part('template-parts/recommend') ?>
          </main>
          <?php get_template_part('template-parts/footer') ?>
    </div><!-- l-wrap -->


    </html>