    <?php get_template_part('template-parts/head') ?>
      <div class="l-wrap">
        <!-- 閉じタグは_footer.ejs -->
        <?php get_template_part('template-parts/header') ?>
        <?php get_template_part('template-parts/contactIcon') ?>
          <main class="l-main">
            <section class="p-mv" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/home/mv/home_mv_bg.png);">
              <div class="p-mv-inner">
                <h2 class="p-mv-ttl-home">グローバルな夢をカタチに</h2>
                <h3 class="p-mv-company"><img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/home/mv/mv_logo.png" alt="株式会社ディッジ 海外サポート" class="p-mv-company-img"></h3>
                <div class="c-scrollMore js-anime04">
                  <span>SCROLL</span>
                </div>
              </div>
              <!-- /.p-mv-inner -->
            </section>
            <div class="visual">
                <div><img src="https://placehold.jp/150x150.png"></div>
                <div><img src="https://placehold.jp/3d4070/ffffff/150x150.png"></div>
                <div><img src="https://placehold.jp/ff1900/ffffff/150x150.png"></div>
            </div>
          </main>
          <?php get_template_part('template-parts/footer') ?>
          <script>
            $('.visual').slick({
              dots: true,
            });
          </script>
