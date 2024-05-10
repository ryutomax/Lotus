<?php
/*
Template Name: お問い合わせ（資料請求）送信完了
*/
?>
  <?php get_template_part('template-parts/head') ?>
    
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
            <div class="wp-block-group has-global-padding is-layout-constrained">
              <h1 style="margin-bottom:var(--wp--preset--spacing--40);" class="wp-block-post-title">お問い合わせ（資料請求）</h1>
            </div>

            <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
              <div class="p-formHead">
                <p class="p-formHead-top">お問い合わせありがとうございました。<br>内容確認後、担当者よりご回答させて頂きます。<br><a href="<?= esc_url(home_url('/')) ?>">TOPへ戻る</a></p>
              </div>

              <?php
              // ここにページの他のコンテンツやテンプレートコードを追加

              // ショートコードを呼び出してフォームを表示
              echo do_shortcode('[mwform_formkey key="130"]');

              // ここにページの他のコンテンツやテンプレートコードを追加
              ?>
              </div>
            <?php get_template_part('template-parts/recommend') ?>
          </main>
          <?php get_template_part('template-parts/footer') ?>
    </div><!-- l-wrap -->


    </html>