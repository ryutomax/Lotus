export default class Form {
  constructor() {
    const button = document.querySelector('.js-send_btn');
    const checkBox01 = document.querySelector('.js-checkBox01');
    const checkBox02 = document.querySelector('.js-checkBox02');

    if(button && checkBox01 && checkBox02) {
      window.addEventListener('load', () => {
        if (checkBox01.checked && checkBox02.checked) {
          button.disabled = false; // 有効化
          button.classList.remove("is-inactive");
        } else {
          button.disabled = true; // ボタンを無効化します
        }
      });

      checkBox01.addEventListener('change', () => {
        if (checkBox01.checked && checkBox02.checked) {
          button.disabled = false; // 有効化
          button.classList.remove("is-inactive");
        } else {
          button.disabled = true; // 無効化
          button.classList.add("is-inactive");
        }
      });

      checkBox02.addEventListener('change', () => {
        if (checkBox01.checked && checkBox02.checked) {
          button.disabled = false; // 有効化
          button.classList.remove("is-inactive");
        } else {
          button.disabled = true; // 無効化
          button.classList.add("is-inactive");
        }
      });
    }
  }
}