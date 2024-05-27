"strict"

const buttons = document.querySelectorAll('.p-input-submit');
const checkBox = document.getElementById('checkBox-1');
// ロード時
document.addEventListener('DOMContentLoaded', ()=> {
  checkBox.checked = false; //no check
  buttons.forEach((button) => {
    if (button.value == '確認') {
      button.disabled = true;
      button.style.pointerEvents = 'none';
    }
  });
});
// checkboxの値の変更時
checkBox.addEventListener('change', () => {
  if (checkBox.checked) {
    buttons.forEach((button) => {
      if (button.value == '確認') {
        button.disabled = false;
        button.style.pointerEvents = 'auto';
      }
    });
  } else {
    buttons.forEach((button) => {
      if (button.value == '確認') {
        button.disabled = true;
        button.style.pointerEvents = 'none';
      }
    });
  }
});