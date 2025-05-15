export default class Breadcrumb {
  constructor() {
    window.onload = function() {
      const breadcrumb = document.getElementById('breadcrumb');
      const breadcrumbList = document.getElementById('breadcrumb-list');

      if(breadcrumb && breadcrumbList) {
        // 要素のwidthを取得
        const brWidth = breadcrumb.getBoundingClientRect().width;
        const brlWidth = breadcrumbList.getBoundingClientRect().width;

        if (brWidth <= brlWidth) {
          breadcrumb.classList.add("is-br-shadow");
        }
        // 取得したwidthをc-breadcrumb-listにCSSで適用
        // breadcrumbList.style.width = `${width}px`;
      }
    };
  }
}