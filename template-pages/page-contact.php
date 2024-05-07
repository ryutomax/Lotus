<?php
/*
Template Name: 取材申込フォーム
*/
?>
  <?php get_template_part('template-parts/head') ?>
    
      <!-- 閉じタグは_footer.ejs -->
        <?php get_template_part('template-parts/header') ?>
          <main class="l-main">
            <section class="p-top-googleAd">
              <div class="p-googleAd-inner"></div>
            </section>
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
                <p class="p-contact-head-intro">Lotusでは、様々なアーティストの皆様の声を募っています。<br>当サイトを通じて、各種イベントやプロモーション活動のお手伝いをいたします。<br>皆様からのコンタクトをお待ちしております。</p>
              </div>
              <div class="p-contact-form">
                <h2 class="p-contact-form-title">取材申込フォーム</h2>
                <p class="p-contact-form-caption">＊印は必須入力項目です。</p>
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
                <div class="p-input-bottom" id="input-bottom">
                  <p class="p-input-bottom-text">ご記入いただいた個人情報は、取材内容の確認および当サイトからのご連絡以外には使用いたしません。<br>プライバシーポリシーにご同意の上、「確認」を押してください。[ <a href="<?php esc_url(home_url('/')); ?>privacy-policy">プライバシーポリシー</a> ]</p>
                  [mwform_checkbox name="agreement" id="checkBox" class="p-MWform-checkBox" children="上記を確認し、当サイトが個人情報を収集することに同意します"]
                </div>
                <div class="p-input-btnArea">
                  [mwform_submitButton name="mwform_submitButton-378" confirm_value="確認" submit_value="送信" class="p-input-submit"]
                  [mwform_backButton value="戻る" class="p-input-back"]
                </div>
                -->
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
    </div><!-- l-wrap -->


    </html>
    <script>
      <?php if(is_page('contact')): ?>
        const targetBtm = document.getElementById('input-bottom');
        if(targetBtm) {
          targetBtm.classList.add('is-display-block');
        }
      <?php endif; ?>
      const buttons = document.querySelectorAll('.p-input-submit');
      const checkBox = document.getElementById('checkBox-1');
      document.addEventListener('DOMContentLoaded', function() {
        checkBox.checked = false;
        buttons.forEach(function(button) {
            if (button.value == '確認') {
                button.disabled = true;
            }
        });
      });
      // チェックボックスの状態が変わった時のイベントリスナーを追加
      checkBox.addEventListener('change', function() {
        if (checkBox.checked) {
          buttons.forEach(function(button) {
              if (button.value == '確認') {
                  button.disabled = false;
              }
          });
        } else {
          buttons.forEach(function(button) {
              if (button.value == '確認') {
                  button.disabled = true;
              }
          });
        }
      });

    </script>