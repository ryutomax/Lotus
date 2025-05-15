    <a href="#" class="c-toUpBtn js-toUpBtn u-zindex_100">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/top_arrow.svg" alt="ページ上部へ">
    </a>
    <footer class="l-footer p-footer">
      <div class="p-footer-inner">
        <h1 class="p-footer-logo">
          クリエイターの言葉を伝えるエンタメ総合メディア
          <a class="p-footer-logo-link" href="<?= esc_url(home_url('/')) ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/footer/footer_logo.png" alt="Lotus クリエイターの言葉を伝えるエンタメ総合メディア" class="p-footer-logo-img" loading="lazy">
          </a>
        </h1>
        <div class="p-header-search u-tb-show">
          <?php get_search_form(); ?>
        </div>
        <nav class="p-footer-nav">
          <ul class="p-footer-nav-top u-tb-show-flex">
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>aboutus" class="p-footer-nav-link"><span class="p-footer-nav-i">A</span>bout Us</a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>newslist" class="p-footer-nav-link"><span class="p-footer-nav-i">N</span>ews</a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>music" class="p-footer-nav-link"><span class="p-footer-nav-i">M</span>usic</a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>animation" class="p-footer-nav-link"><span class="p-footer-nav-i">A</span>nime</a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>game" class="p-footer-nav-link"><span class="p-footer-nav-i">G</span>ame</a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>entertainment" class="p-footer-nav-link"><span class="p-footer-nav-i">E</span>ntertainment</a></li>
          </ul>
          <div class="p-footer-nav-btm">
            <a href="<?= esc_url(home_url('/')) ?>information" class="p-footer-nav-link">運営会社/利用規約/プライバシーポリシー</a>
            <a href="<?= esc_url(home_url('/')) ?>contact" class="p-footer-nav-link">掲載依頼・お問い合わせ</a>
          </div>
        </nav>
      </div>
      <!-- /.l-footer__inner -->
      <small class="p-footer-copyright">Copyright &#169; DH Inc.CO.,LTD. All rights reserved.</small>
      <?php wp_footer() ?>
    </footer>
  </body>
</html>