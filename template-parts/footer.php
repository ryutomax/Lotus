    <footer class="l-footer p-footer">
      <div class="p-footer-inner">
        <h1 class="p-footer-logo">
          クリエイターの言葉を伝えるエンタメ総合メディア
          <a class="p-footer-logo-link" href="<?= esc_url(home_url('/')) ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/footer/footer_logo.png" alt="Lotus クリエイターの言葉を伝えるエンタメ総合メディア" class="p-footer-logo-img">
          </a>
        </h1>
        <nav class="p-footer-nav">
          <a href="<?= esc_url(home_url('/')) ?>company" class="p-footer-nav-link">運営会社</a>
          <a href="<?= esc_url(home_url('/')) ?>contact" class="p-footer-nav-link">掲載依頼・お問い合わせ</a>
          <a href="<?= esc_url(home_url('/')) ?>termsOfUse" class="p-footer-nav-link">利用規約</a>
          <a href="<?= esc_url(home_url('/')) ?>privacy" class="p-footer-nav-link">プライバシーポリシー</a>
        </nav>
      </div>
      <!-- /.l-footer__inner -->
      <small class="p-footer-copyright">Copyright &#169; DH Inc.CO.,LTD. All rights reserved.</small>
      <?php wp_footer() ?>
    </footer>
  </body>
</html>