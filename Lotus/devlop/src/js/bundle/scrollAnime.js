// import $ from 'jquery'

export default class scrollAnime {
  constructor() {

    // スクロールトップ
    $('.js-toUpBtn').on('click', () => {

      $('html, body').animate({ scrollTop: 0 });

    });

    $(window).on('scroll', () => { // スクロール毎にイベントが発火します。
      const scrollH = $(document).scrollTop();

      if (scrollH > 500) {
        $('.js-toUpBtn').addClass('is-btn-show');
      } else {
        $('.js-toUpBtn').removeClass('is-btn-show');
      }
    });

    const headerHeight = document.querySelector('header').offsetHeight;

    // // ページ内リンクがクリックされたときに実行される関数
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();

          const targetId = this.getAttribute('href').substring(1); // # を削除
          const targetElement = document.getElementById(targetId);

          if (targetElement) {
              // スクロール動作を設定
              window.scrollTo({
                  // top: targetElement.offsetTop,
                  top: targetElement.getBoundingClientRect().top + window.scrollY - headerHeight,
                  behavior: 'smooth' // スムーズスクロールを有効にする
              });
          }
      });
    });


    let startPos = 0;
    let winScrollTop = 0;
    const Header = $('#header');
    $(window).on('scroll',function(){
      $(Header).css('transition','.5s');
      winScrollTop = $(this).scrollTop();
      if (winScrollTop >= startPos && winScrollTop > 120) { // >120・・・ios対応
        $(Header).addClass('is-header-hide');
      } else {
        $(Header).removeClass('is-header-hide');
      }
      startPos = winScrollTop;
    });

  }
}
