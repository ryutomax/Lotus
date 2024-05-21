<header id="header" class="l-header p-header u-zindex_1000">
  <div class="p-header-inner">
    <div class="p-header-top">
      <h1 class="p-header-logo c-logo">
        <a class="p-header-logo-link" href="<?= esc_url(home_url('/')) ?>">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/header/header-logo.png" alt="Lotus クリエイターの言葉を伝えるエンタメ総合メディア" class="p-header-logo-img">
        </a>
        <span>クリエイターの言葉を伝えるエンタメ総合メディア</span>
      </h1>
      <div class="p-header-search u-tb-none">
        <?php get_search_form(); ?>
      </div>
      <button class="p-header-menuBtn js-menu-btn u-tb-show" aria-label="Menuを開く">
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
      </button>
    </div>
    <div class="p-header-btm js-menu-show">
      <div class="p-header-search u-tb-show">
        <?php get_search_form(); ?>
      </div>
      <nav class="p-header-nav">
        <div class="p-header-nav-item js-menu-text01"><a href="<?= esc_url(home_url('/')) ?>aboutus" class="p-header-nav-link"><span class="p-header-nav-i">A</span>bout Us<span class="p-header-nav-sub u-tb-show">ロータスについて</span></a></div>
        <div class="p-header-nav-item js-menu-text02"><a href="<?= esc_url(home_url('/')) ?>newslist" class="p-header-nav-link"><span class="p-header-nav-i">N</span>ews<span class="p-header-nav-sub u-tb-show">ニュース</span></a></div>
        <div class="p-header-nav-item js-menu-text03"><a href="<?= esc_url(home_url('/')) ?>music" class="p-header-nav-link"><span class="p-header-nav-i">M</span>usic<span class="p-header-nav-sub u-tb-show">ミュージック</span></a></div>
        <div class="p-header-nav-item js-menu-text04"><a href="<?= esc_url(home_url('/')) ?>animation" class="p-header-nav-link"><span class="p-header-nav-i">A</span>nime<span class="p-header-nav-sub u-tb-show">アニメ</span></a></div>
        <div class="p-header-nav-item js-menu-text05"><a href="<?= esc_url(home_url('/')) ?>game" class="p-header-nav-link"><span class="p-header-nav-i">G</span>ame<span class="p-header-nav-sub u-tb-show">ゲーム</span></a></div>
        <div class="p-header-nav-item js-menu-text06"><a href="<?= esc_url(home_url('/')) ?>entertainment" class="p-header-nav-link"><span class="p-header-nav-i">E</span>ntertainment<span class="p-header-nav-sub u-tb-show">エンタメ</span></a></div>
      </nav>
      <!-- /.p-header-nav -->
    </div>
    <!-- /.p-header-inner-right -->
  </div>
  <!-- /.p-header-inner -->
</header>
