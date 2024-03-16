import $ from 'jquery'

export default class Menu {
  constructor() {
    $('.js-menu-btn').on('click', () => {
      $('.js-menu-show').toggleClass('is-menu-show');
      $('.js-menu-btn-bar').toggleClass('is-bar-move');

      //背景スクロール ロック
      $('body').toggleClass('is-stay');
    });

    $('.js-link-close').on('click', () => {
      $('.js-menu-show').toggleClass('is-menu-show');
      $('.js-menu-btn-bar').toggleClass('is-bar-move');

      //背景スクロール ロック
      $('body').toggleClass('is-stay');
    });

    //サブメニューアニメーション
    const subNavTrigger = document.querySelector('.js-nav-sub-trigger');
    const subNavTarget = document.querySelector('.js-nav-sub-tgt')

    subNavTrigger.addEventListener('mouseenter', () => {
      subNavTarget.classList.add('is-sub-show');
    });
    subNavTrigger.addEventListener('mouseleave', () => {
      subNavTarget.classList.remove('is-sub-show');
    });

    subNavTarget.addEventListener('mouseenter', () => {
      subNavTarget.classList.add('is-sub-show');
    });
    subNavTarget.addEventListener('mouseleave', () => {
      subNavTarget.classList.remove('is-sub-show');
    });
  }
}

