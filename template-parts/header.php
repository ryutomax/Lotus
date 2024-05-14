<header id="header" class="l-header p-header u-zindex_100">
  <div class="p-header-inner">
    <div class="p-header-top">
      <h1 class="p-header-logo c-logo">
        <a class="p-header-logo-link" href="<?= esc_url(home_url('/')) ?>">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/header/header-logo.png" alt="Lotus クリエイターの言葉を伝えるエンタメ総合メディア" class="p-header-logo-img">
        </a>
        クリエイターの言葉を伝えるエンタメ総合メディア
      </h1>
      <div class="p-header-search">
          <?php get_search_form(); ?>
      </div>
    </div>
    <div class="p-header-btm">
      <nav class="p-header-nav">
        <a href="<?= esc_url(home_url('/')) ?>aboutus" class="p-header-nav-link"><span>A</span>bout Us</a>
        <a href="<?= esc_url(home_url('/')) ?>newslist" class="p-header-nav-link"><span>N</span>ews</a>
        <a href="<?= esc_url(home_url('/')) ?>music" class="p-header-nav-link"><span>M</span>usic</a>
        <a href="<?= esc_url(home_url('/')) ?>animation" class="p-header-nav-link"><span>A</span>nime</a>
        <a href="<?= esc_url(home_url('/')) ?>game" class="p-header-nav-link"><span>G</span>ame</a>
        <a href="<?= esc_url(home_url('/')) ?>entertainment" class="p-header-nav-link"><span>E</span>ntertainment</a>
        <!-- <button class="p-header-menuBtn js-menu-btn" aria-label="Menuを開く">
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        </button> -->
      </nav>
      <!-- /.p-header-nav -->
    </div>
    <!-- /.p-header-inner-right -->
  </div>
  <!-- /.p-header-inner -->
</header>
