<?php get_template_part('template-parts/head') ?>
  <div class="l-wrap">
    <!-- 閉じタグは_footer.ejs -->
    <?php get_template_part('template-parts/header') ?>
    <?php get_template_part('template-parts/contactIcon') ?>
      <main class="l-main p-top">
        <section class="p-top-googleAd">
          <div class="p-googleAd-inner"></div>
        </section>
        <section class="p-top-slider">
          <div class="p-top-slider-item">
            <a href="" class="p-top-slider-link">
              <img class="p-top-slider-img" src="https://placehold.jp/150x150.png">
              <div class="p-top-slider-info">
                <span class="p-top-slider-tag">ミュージック</span>
                <h2 class="p-top-slider-title">タイトル01</h2>
              </div>
            </a>
          </div>
          <div class="p-top-slider-item">
            <a href="" class="p-top-slider-link">
              <img class="p-top-slider-img" src="https://placehold.jp/3d4070/ffffff/150x150.png">
              <div class="p-top-slider-info">
                <span class="p-top-slider-tag">アニメ</span>
                <h2 class="p-top-slider-title">タイトル02</h2>
              </div>
            </a>
          </div>
          <div class="p-top-slider-item">
            <a href="" class="p-top-slider-link">
              <img class="p-top-slider-img" src="https://placehold.jp/ff1900/ffffff/150x150.png">
              <div class="p-top-slider-info">
                <span class="p-top-slider-tag">ゲーム</span>
                <h2 class="p-top-slider-title">タイトル03</h2>
              </div>
            </a>
          </div>
        </section>
        <section class="p-mid-googleAd">
          <div class="p-googleAd-inner"></div>
        </section>
        <div class="p-topContent">
          <section class="p-content">
            <div class="p-pickUp">
              <h2 class="p-pickUp-title">Pick Up News</h2>
              <div class="p-pickUp-list">
                <article class="p-pickUp-article">
                  <a class="p-pickUp-article-link" href="">
                    <img class="p-pickUp-article-thumbnail" src="https://placehold.jp/ff1900/ffffff/150x150.png" alt="">
                    <time class="p-pickUp-article-time" datetime=""></time>
                    <p class="p-pickUp-article-text"></p>
                  </a>
                </article>
                <article class="p-pickUp-article">
                  <a class="p-pickUp-article-link" href="">
                    <img class="p-pickUp-article-thumbnail" src="https://placehold.jp/150x150.png" alt="">
                    <time class="p-pickUp-article-time" datetime=""></time>
                    <p class="p-pickUp-article-text"></p>
                  </a>
                </article>
                <article class="p-pickUp-article">
                  <a class="p-pickUp-article-link" href="">
                    <img class="p-pickUp-article-thumbnail" src="https://placehold.jp/3d4070/ffffff/150x150.png" alt="">
                    <time class="p-pickUp-article-time" datetime=""></time>
                    <p class="p-pickUp-article-text"></p>
                  </a>
                </article>
              </div>
            </div>
            <div class="p-articles">
              <article class="p-article">
                <time class="p-article-time" datetime=""></time>
                <img src="" alt="" class="p-article-thumbnail">
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
          slidesToShow: 2.325,
        });
        $('.p-pickUp-list').slick({
          dots: true,
          slidesToShow: 4,
        });
      </script>
