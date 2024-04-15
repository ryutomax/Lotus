<?php
/*
Template Name: 取材申込フォーム
*/
?>
  <?php get_template_part('template-parts/head') ?>
    <div class="l-wrap">
      <!-- 閉じタグは_footer.ejs -->
        <?php get_template_part('template-parts/header') ?>
          <main class="l-main">
            <section class="p-mv"  style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>);">
              <div class="p-mv-inner">
              </div>
              <!-- /.p-mv-inner -->
            </section>
            <div id="breadcrumb" class="c-breadcrumb">
              <div class="c-breadcrumb-inner">
                  <div class="c-breadcrumb-cont">
                      <ol class="c-breadcrumb-list">
                        <li class="c-breadcrumb-item"><a href="<?= esc_url(home_url('/')) ?>">TOP</a></li>
                        <li class="c-breadcrumb-item">取材申込フォーム</li>
                      </ol>
                  </div>
              </div>
            </div>
            <!-- /.c-breadcrumb -->

            <div class="entry-content wp-block-post-content has-global-padding is-layout-constrained">
              <div class="p-formHead">
                <p class="p-formHead-top">ご訪問ありがとうございます。<br>お見積りのご要望やご不明な点等<br class="u-tb-show">お気軽にご連絡ください。<br>内容確認後、担当者よりご回答させて頂きます。<br><span>「※」マークのある項目は必須項目となります。</span></p>
                <p class="p-formHead-bottom">内容をご確認の上、<br class="u-tb-show">「送信する」ボタンを押してください。</p>
              </div>
              <!-- <div class="p-input-wrap">
                <label class="p-input-label">貴社名(部署名)<span>＊</span></label>
                [mwform_text name="貴社名(部署名)" class="p-input-text" size="60" placeholder="例）〇〇レコード　〇〇バンド担当"]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">媒体名・番組名<span>＊</span></label>
                [mwform_text name="媒体名・番組名" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">ご担当者様指名<span>＊</span></label>
                [mwform_text name="ご担当者様指名" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">メールアドレス<span>＊</span></label>
                [mwform_email name="メールアドレス" class="p-input-text" size="60"]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">連絡可能な電話番号<span>＊</span></label>
                [mwform_text name="連絡可能な電話番号" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">取材内容・趣旨<span>＊</span></label>
                [mwform_textarea name="取材内容・趣旨" class="p-input-textarea" cols="50" rows="5" placeholder="取材対象者のご要望があればお知らせください。"]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">取材方法<span>＊</span></label>
                [mwform_text name="取材方法" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">取材希望日時または期限<span>＊</span></label>
                [mwform_text name="取材希望日時または期限" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">撮影の有無<span>＊</span></label>
                [mwform_text name="撮影の有無" class="p-input-text" size="60" placeholder=""]
              </div>
              <div class="p-input-wrap">
                <label class="p-input-label">通信欄</label>
                [mwform_textarea name="通信欄" class="p-input-textarea" cols="50" rows="5" placeholder="その他何かあればご記入ください。"]
              </div>
              [mwform_submitButton name="mwform_submitButton-378" confirm_value="確認画面へ" submit_value="送信する"]
              [mwform_backButton value="戻る"] -->
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