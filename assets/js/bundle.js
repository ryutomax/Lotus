/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/bundle/Menu.js":
/*!*******************************!*\
  !*** ./src/js/bundle/Menu.js ***!
  \*******************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ Menu; }\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\n// import $ from 'jquery'\nvar Menu = /*#__PURE__*/_createClass(function Menu() {\n  _classCallCheck(this, Menu);\n\n  $('.js-menu-btn').on('click', function () {\n    $('.js-menu-show').toggleClass('is-menu-show');\n    $('.js-menu-btn-bar').toggleClass('is-bar-move');\n\n    for (var i = 1; i <= 6; i++) {\n      $(\".js-menu-text0\".concat(i)).toggleClass(\"is-menu-show-text0\".concat(i));\n    } //背景スクロール ロック\n\n\n    $('body').toggleClass('is-stay');\n  });\n  $('.js-link-close').on('click', function () {\n    $('.js-menu-show').toggleClass('is-menu-show');\n    $('.js-menu-btn-bar').toggleClass('is-bar-move');\n\n    for (var i = 0; i < 6; i++) {\n      $(\".p-header-nav-link:nth-child(\".concat(i, \")\")).toggleClass(\"is-menu-show-text0\".concat(i));\n    } //背景スクロール ロック\n\n\n    $('body').toggleClass('is-stay');\n  }); // //サブメニューアニメーション\n  // const subNavTrigger = document.querySelector('.js-nav-sub-trigger');\n  // const subNavTarget = document.querySelector('.js-nav-sub-tgt')\n  // subNavTrigger.addEventListener('mouseenter', () => {\n  //   subNavTarget.classList.add('is-sub-show');\n  // });\n  // subNavTrigger.addEventListener('mouseleave', () => {\n  //   subNavTarget.classList.remove('is-sub-show');\n  // });\n  // subNavTarget.addEventListener('mouseenter', () => {\n  //   subNavTarget.classList.add('is-sub-show');\n  // });\n  // subNavTarget.addEventListener('mouseleave', () => {\n  //   subNavTarget.classList.remove('is-sub-show');\n  // });\n});\n\n\n\n//# sourceURL=webpack://rlog_dev/./src/js/bundle/Menu.js?");

/***/ }),

/***/ "./src/js/bundle/breadcrumb.js":
/*!*************************************!*\
  !*** ./src/js/bundle/breadcrumb.js ***!
  \*************************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ Breadcrumb; }\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar Breadcrumb = /*#__PURE__*/_createClass(function Breadcrumb() {\n  _classCallCheck(this, Breadcrumb);\n\n  window.onload = function () {\n    var breadcrumb = document.getElementById('breadcrumb');\n    var breadcrumbList = document.getElementById('breadcrumb-list');\n\n    if (breadcrumb && breadcrumbList) {\n      // 要素のwidthを取得\n      var brWidth = breadcrumb.getBoundingClientRect().width;\n      var brlWidth = breadcrumbList.getBoundingClientRect().width;\n\n      if (brWidth <= brlWidth) {\n        breadcrumb.classList.add(\"is-br-shadow\");\n      } // 取得したwidthをc-breadcrumb-listにCSSで適用\n      // breadcrumbList.style.width = `${width}px`;\n\n    }\n  };\n});\n\n\n\n//# sourceURL=webpack://rlog_dev/./src/js/bundle/breadcrumb.js?");

/***/ }),

/***/ "./src/js/bundle/moveAds.js":
/*!**********************************!*\
  !*** ./src/js/bundle/moveAds.js ***!
  \**********************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ MoveAds; }\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar MoveAds = /*#__PURE__*/_createClass(function MoveAds() {\n  _classCallCheck(this, MoveAds);\n\n  function moveAutoPlacedAds() {\n    var pFooter = document.querySelector('.p-footer');\n\n    if (pFooter) {\n      // \"p-footer\" の次の兄弟要素を取得\n      var nextElement = pFooter.nextElementSibling;\n      var googleAutoPlacedElement = null; // \"google-auto-placed\" クラスを持つ要素が見つかるまでループ\n\n      while (nextElement) {\n        if (nextElement.classList.contains('google-auto-placed')) {\n          googleAutoPlacedElement = nextElement;\n          break;\n        }\n\n        nextElement = nextElement.nextElementSibling;\n      }\n\n      if (googleAutoPlacedElement) {\n        // \"google-auto-placed\" 要素を \"p-footer\" の直前に移動\n        pFooter.parentNode.insertBefore(googleAutoPlacedElement, pFooter);\n        clearInterval(intervalId); //終了\n      }\n    }\n  }\n\n  var intervalId = setInterval(moveAutoPlacedAds, 500);\n});\n\n\n\n//# sourceURL=webpack://rlog_dev/./src/js/bundle/moveAds.js?");

/***/ }),

/***/ "./src/js/bundle/scrollAnime.js":
/*!**************************************!*\
  !*** ./src/js/bundle/scrollAnime.js ***!
  \**************************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* binding */ scrollAnime; }\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\n// import $ from 'jquery'\nvar scrollAnime = /*#__PURE__*/_createClass(function scrollAnime() {\n  _classCallCheck(this, scrollAnime);\n\n  // スクロールトップ\n  $('.js-toUpBtn').on('click', function () {\n    $('html, body').animate({\n      scrollTop: 0\n    });\n  });\n  $(window).on('scroll', function () {\n    // スクロール毎にイベントが発火します。\n    var scrollH = $(document).scrollTop();\n\n    if (scrollH > 500) {\n      $('.js-toUpBtn').addClass('is-btn-show');\n    } else {\n      $('.js-toUpBtn').removeClass('is-btn-show');\n    }\n  });\n  var headerHeight = document.querySelector('header').offsetHeight; // // ページ内リンクがクリックされたときに実行される関数\n\n  document.querySelectorAll('a[href^=\"#\"]').forEach(function (anchor) {\n    anchor.addEventListener('click', function (e) {\n      e.preventDefault();\n      var targetId = this.getAttribute('href').substring(1); // # を削除\n\n      var targetElement = document.getElementById(targetId);\n\n      if (targetElement) {\n        // スクロール動作を設定\n        window.scrollTo({\n          // top: targetElement.offsetTop,\n          top: targetElement.getBoundingClientRect().top + window.scrollY - headerHeight,\n          behavior: 'smooth' // スムーズスクロールを有効にする\n\n        });\n      }\n    });\n  });\n  var startPos = 0;\n  var winScrollTop = 0;\n  var Header = $('#header');\n  $(window).on('scroll', function () {\n    $(Header).css('transition', '.5s');\n    winScrollTop = $(this).scrollTop();\n\n    if (winScrollTop >= startPos && winScrollTop > 120) {\n      // >120・・・ios対応\n      $(Header).addClass('is-header-hide');\n    } else {\n      $(Header).removeClass('is-header-hide');\n    }\n\n    startPos = winScrollTop;\n  });\n});\n\n\n\n//# sourceURL=webpack://rlog_dev/./src/js/bundle/scrollAnime.js?");

/***/ }),

/***/ "./src/js/entry.js":
/*!*************************!*\
  !*** ./src/js/entry.js ***!
  \*************************/
/***/ (function(__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _bundle_scrollAnime_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bundle/scrollAnime.js */ \"./src/js/bundle/scrollAnime.js\");\n/* harmony import */ var _bundle_Menu_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./bundle/Menu.js */ \"./src/js/bundle/Menu.js\");\n/* harmony import */ var _bundle_breadcrumb_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./bundle/breadcrumb.js */ \"./src/js/bundle/breadcrumb.js\");\n/* harmony import */ var _bundle_moveAds_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./bundle/moveAds.js */ \"./src/js/bundle/moveAds.js\");\n// import About from './bundle/about/About'\n// import Form from './bundle/form'\n\n // import Loading from './bundle/loading.js'\n\n\n // new About();\n// new Form();\n\nnew _bundle_scrollAnime_js__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\nnew _bundle_Menu_js__WEBPACK_IMPORTED_MODULE_1__[\"default\"](); // new Loading();\n\nnew _bundle_breadcrumb_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"]();\nnew _bundle_moveAds_js__WEBPACK_IMPORTED_MODULE_3__[\"default\"]();\n\n//# sourceURL=webpack://rlog_dev/./src/js/entry.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/entry.js");
/******/ 	
/******/ })()
;