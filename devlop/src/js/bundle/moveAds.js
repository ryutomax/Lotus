export default class MoveAds {
  constructor() {
    function moveAutoPlacedAds() {
      const pFooter = document.querySelector('.p-footer');
      if(pFooter) {
        // "p-footer" の次の兄弟要素を取得
        let nextElement = pFooter.nextElementSibling;
        let googleAutoPlacedElement = null;

        // "google-auto-placed" クラスを持つ要素が見つかるまでループ
        while (nextElement) {
          if (nextElement.classList.contains('google-auto-placed')) {
            googleAutoPlacedElement = nextElement;
            break;
          }
          nextElement = nextElement.nextElementSibling;
        }
        if (googleAutoPlacedElement) {
          // "google-auto-placed" 要素を "p-footer" の直前に移動
          pFooter.parentNode.insertBefore(googleAutoPlacedElement, pFooter);
          clearInterval(intervalId); //終了
        }
      }
    }
    let intervalId = setInterval(moveAutoPlacedAds, 500);
  }
}