<header class="l-header p-header u-zindex_100">
  <div class="p-header-inner">
    <h1 class="p-header-logo c-logo">
      <a class="p-header-logo-link" href="<?= esc_url(home_url('/')) ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/header/header-logo.png" alt="株式会社ディッジ 海外サポート" class="p-header-logo-img">
      </a>
    </h1>
    <div class="search-form">
        <?php get_search_form(); ?>
    </div>
    <div class="p-header-inner-right">
      <nav class="p-header-nav">
        <span class="p-header-nav-wrap js-menu-show">
          <a href="<?= esc_url(home_url('/')) ?>" class="p-header-nav-link">TOP</a>
          <a href="<?= esc_url(home_url('/')) ?>service" class="p-header-nav-link">サービス内容</a>
          <a href="<?= esc_url(home_url('/')) ?>company" class="p-header-nav-link">会社概要</a>
        </span>
        <button class="p-header-menuBtn js-menu-btn" aria-label="Menuを開く">
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
          <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        </button>
      </nav>
      <!-- /.p-header-nav -->
    </div>
    <!-- /.p-header-inner-right -->
  </div>
  <!-- /.p-header-inner -->
</header>
