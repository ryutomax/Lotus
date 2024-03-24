<?php get_template_part('template-parts/head') ?>
  <div class="l-wrap">
    <!-- 閉じタグは_footer.ejs -->
    <?php get_template_part('template-parts/header') ?>
    <?php get_template_part('template-parts/contactIcon') ?>
      <main class="l-main">
        <section class="p-google-ads-top">
        </section>
        <section class="p-top-slider">
          <div><img src="https://placehold.jp/150x150.png"></div>
          <div><img src="https://placehold.jp/3d4070/ffffff/150x150.png"></div>
          <div><img src="https://placehold.jp/ff1900/ffffff/150x150.png"></div>
        </section>
        <section class="p-google-ads-mid">
        </section>
        <div class="u-flex">
          <section class="p-content">
            <div class="p-pickUp">
              <h2 class="p-pickUp-title">Pick Up News</h2>
              <div class="p-pickUp-list">
                <article class="p-pickUp-article">
                  <a class="p-pickUp-article-link" href="">
                    <img class="p-pickUp-article-thumbnail" src="" alt="">
                    <time class="p-pickUp-article-time" datetime=""></time>
                    <p class="p-pickUp-article-text"></p>
                  </a>
                </article>
              </div>
            </div>
            <div class="p-articles">
              <article class="p-article">
                <time class="p-article-time" datetime=""></time>
                <img src="" alt="" class="p-article-thumb">
                <h2 class="p-article-title"></h2>
                <ul class="p-article-tags">
                  <li class="p-article-tag"></li>
                </ul>
              </article>
            </div>
          </section>
          <section class="p-side"></section>
        </div>
      </main>
      <?php get_template_part('template-parts/footer') ?>
      <script>
        $('.p-top-slider').slick({
          dots: true,
        });
      </script>
