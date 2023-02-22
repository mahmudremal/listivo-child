/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/widgets.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/widgets.js":
/*!***************************!*\
  !*** ./src/js/widgets.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _widgets_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./widgets/index */ "./src/js/widgets/index.js");
/* harmony import */ var _widgets_index__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_widgets_index__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _sass_widgets_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sass/widgets.scss */ "./src/sass/widgets.scss");
/* harmony import */ var _sass_widgets_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_sass_widgets_scss__WEBPACK_IMPORTED_MODULE_1__);
// Scripts
 // Styles



/***/ }),

/***/ "./src/js/widgets/index.js":
/*!*********************************!*\
  !*** ./src/js/widgets/index.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

(function ($) {
  var FWPListivo_Widgets = /*#__PURE__*/function () {
    function FWPListivo_Widgets() {
      _classCallCheck(this, FWPListivo_Widgets);

      this.init();
    }

    _createClass(FWPListivo_Widgets, [{
      key: "init",
      value: function init() {
        var thisClass = this;
        var swiperInterval;
        swiperInterval = setInterval(function () {
          if (typeof Swiper !== 'undefined') {
            thisClass.initSwiper(); // clearInterval( swiperInterval );
            // console.log( 'i got it' );
          }
        }, 1500);
      }
    }, {
      key: "initSwiper",
      value: function initSwiper() {
        var thisClass = this;
        var args,
            elems,
            elem,
            elemCls = '.listivo-swiper-slider .swiper-container';
        elems = document.querySelectorAll(elemCls + ':not(.is-handled)'); // if( elems.length <= 0 ) {return;}

        elems.forEach(function (elem, index) {
          var _args;

          // const $ = jQuery;
          args = (_args = {
            // Optional parameters
            speed: 1000,
            spaceBetween: 10,
            // autoplay: true,
            autoplay: {
              // delay: 5000,
              pauseOnMouseEnter: true
            },
            freeMode: {
              enabled: true,
              sticky: true
            },
            mousewheel: {
              invert: true,
              sensitivity: 250
            },
            // parallax: true,
            loop: true,
            grabCursor: true,
            // centeredSlides: true,
            breakpointsBase: 'container'
          }, _defineProperty(_args, "loop", true), _defineProperty(_args, "pagination", {
            el: '.swiper-pagination',
            clickable: true
          }), _defineProperty(_args, "navigation", {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          }), _defineProperty(_args, "scrollbar", {
            el: '.swiper-scrollbar'
          }), _defineProperty(_args, "on", {
            init: function init() {
              var swiper = this;

              for (var i = 0; i < swiper.slides.length; i++) {
                $(swiper.slides[i]).find('.img-container').attr({
                  'data-swiper-parallax': .7 * swiper.width,
                  'data-swiper-paralalx-opacity': .2
                });
                $(swiper.slides[i]).find('.title').attr('data-swiper-parallax', .8 * swiper.width);
                $(swiper.slides[i]).find('.description').attr('data-swiper-parallax', .9 * swiper.width);
              }
            },
            resize: function resize() {
              this.update();
            }
          }), _defineProperty(_args, "slidesPerView", 3), _defineProperty(_args, "breakpoints", {
            320: {
              slidesPerView: 1,
              spaceBetween: 0
            },
            480: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            750: {
              slidesPerView: 3,
              spaceBetween: 10
            },
            1200: {
              slidesPerView: 4,
              spaceBetween: 10
            }
          }), _args);
          var swiper = new Swiper(elemCls, args);
          elem.classList.add('is-handled'); // $(window).on('resize', function () {
          // 	swiper.destroy();
          // 	swiper = new Swiper('.listivo-swiper-slider .swiper-container', args );
          // });
          // Now you can use all slider methods like
          // swiper.slideNext();
        });
      }
    }]);

    return FWPListivo_Widgets;
  }();

  new FWPListivo_Widgets();
})(jQuery);

/***/ }),

/***/ "./src/sass/widgets.scss":
/*!*******************************!*\
  !*** ./src/sass/widgets.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=widgets.js.map