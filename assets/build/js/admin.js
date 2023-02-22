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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/admin.js":
/*!*************************!*\
  !*** ./src/js/admin.js ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _backend_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./backend/index */ "./src/js/backend/index.js");
/* harmony import */ var _backend_index__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_backend_index__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _backend_notice__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./backend/notice */ "./src/js/backend/notice.js");
/* harmony import */ var _backend_notice__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_backend_notice__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _backend_buttons__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./backend/buttons */ "./src/js/backend/buttons.js");
/* harmony import */ var _sass_admin_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../sass/admin.scss */ "./src/sass/admin.scss");
/* harmony import */ var _sass_admin_scss__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_sass_admin_scss__WEBPACK_IMPORTED_MODULE_3__);
// Scripts


 // Styles

 // Images.

/***/ }),

/***/ "./src/js/backend/buttons.js":
/*!***********************************!*\
  !*** ./src/js/backend/buttons.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/


(function ($) {
  var FWProject_Buttons = /*#__PURE__*/function () {
    function FWProject_Buttons() {
      var _FWPsiteConfig$ajaxUr, _FWPsiteConfig, _FWPsiteConfig$ajax_n, _FWPsiteConfig2;

      _classCallCheck(this, FWProject_Buttons);

      this.ajaxUrl = (_FWPsiteConfig$ajaxUr = (_FWPsiteConfig = FWPsiteConfig) === null || _FWPsiteConfig === void 0 ? void 0 : _FWPsiteConfig.ajaxUrl) !== null && _FWPsiteConfig$ajaxUr !== void 0 ? _FWPsiteConfig$ajaxUr : '';
      this.ajaxNonce = (_FWPsiteConfig$ajax_n = (_FWPsiteConfig2 = FWPsiteConfig) === null || _FWPsiteConfig2 === void 0 ? void 0 : _FWPsiteConfig2.ajax_nonce) !== null && _FWPsiteConfig$ajax_n !== void 0 ? _FWPsiteConfig$ajax_n : '';
      this.btnSwitch(); // 01775898205
      // Best Friend
      // this is a translated message by js  __( 'Layout style dark background', 'fwp-Listivo-child-c4trade' ),
    }

    _createClass(FWProject_Buttons, [{
      key: "btnSwitch",
      value: function btnSwitch() {
        var thisClass = this;
        var x, c, s, a, ev, is, go;
        document.querySelectorAll('.btn-ajax-switch').forEach(function (e, i) {
          if (e.dataset.isHandled != true) {
            e.dataset.isHandled = true;
            e.addEventListener('click', function (event) {
              if (false !== (ev = e.dataset.events) && (!e.dataset.disabled || e.dataset.disabled == 'false')) {
                thisClass.beforeEffect(e);
                go = true;
                ev = JSON.parse(ev); // console.log( ev );

                if (ev.confirm && !confirm(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__["__"])('Are you sure you want to switch this listing status?', 'domain'))) {
                  go = false;
                  thisClass.afterEffect(e);
                }

                if (ev.request && ev.request.action && ev.request.action != '' && go) {
                  ev.request.status = e.dataset.status == 'on' ? 'pending' : 'publish';
                  $.ajax({
                    url: thisClass.ajaxUrl,
                    type: 'post',
                    data: ev.request,
                    success: function success(response) {
                      is = response.success && response.data.status;
                      thisClass.proceed(e, is);
                    },
                    error: function error(response) {
                      console.log(response.responseText);
                      thisClass.afterEffect(e);
                    }
                  });
                } else {
                  !go || thisClass.proceed(e, true);
                }
              }
            });
          }
        });
      }
    }, {
      key: "proceed",
      value: function proceed(e, status) {
        var thisClass = this;
        var a;

        if (status) {
          e.dataset.status = e.dataset.status == 'on' ? 'off' : 'on';

          if (e.dataset.onFinished) {
            // window[ e.dataset.onFinished ]( e );
            eval(e.dataset.onFinished); // var F = new Function( e.dataset.onFinished );return( F() );
          }
        }

        thisClass.afterEffect(e);
      }
    }, {
      key: "beforeEffect",
      value: function beforeEffect(e) {
        e.classList.add('loading');
        e.dataset.disabled = true;

        if (e.dataset.onInit) {
          // window[ e.dataset.onInit ]( e );
          eval(e.dataset.onInit);
        }
      }
    }, {
      key: "afterEffect",
      value: function afterEffect(e) {
        e.classList.remove('loading');
        e.dataset.disabled = false;
      }
    }]);

    return FWProject_Buttons;
  }();

  new FWProject_Buttons();
})(jQuery);

/***/ }),

/***/ "./src/js/backend/index.js":
/*!*********************************!*\
  !*** ./src/js/backend/index.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

(function ($) {
  var FWPListivoBackendJS = /*#__PURE__*/function () {
    function FWPListivoBackendJS() {
      _classCallCheck(this, FWPListivoBackendJS);

      this.mediaUploader();
      this.ajaxComplete();
    }

    _createClass(FWPListivoBackendJS, [{
      key: "mediaUploader",
      value: function mediaUploader() {
        // on upload button click
        $('body').on('click', '.fwplistivo-upload', function (event) {
          event.preventDefault(); // prevent default link click and page refresh

          var mediaConfig = this.dataset.config ? JSON.parse(this.dataset.config) : {
            title: 'Insert image',
            // modal window title
            library: {
              // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
              type: 'image'
            },
            button: {
              text: 'Use this image' // button label text

            },
            multiple: false
          }; // console.log( mediaConfig );

          var button = $(this);
          var imageId = button.next().next().val();
          var customUploader = wp.media(mediaConfig).on('select', function () {
            // it also has "open" and "close" events
            var attachment = customUploader.state().get('selection').first().toJSON();
            button.removeClass('button').html('<img src="' + attachment.url + '">'); // add image instead of "Upload Image"

            button.next().show(); // show "Remove image" link

            button.next().next().val(attachment.id); // Populate the hidden field with image ID
          }); // already selected images

          customUploader.on('open', function () {
            if (imageId) {
              var selection = customUploader.state().get('selection');
              attachment = wp.media.attachment(imageId);
              attachment.fetch();
              selection.add(attachment ? [attachment] : []);
            }
          });
          customUploader.open();
        }); // on remove button click

        $('body').on('click', '.fwplistivo-remove', function (event) {
          event.preventDefault();
          var button = $(this);
          button.next().val(''); // emptying the hidden field

          button.hide().prev().addClass('button').html('Upload image'); // replace the image with text
        });
      }
    }, {
      key: "ajaxComplete",
      value: function ajaxComplete() {
        var numberOfTags = 0;
        var newNumberOfTags = 0; // when there are some terms are already created

        if (!$('#the-list').children('tr').first().hasClass('no-items')) {
          numberOfTags = $('#the-list').children('tr').length;
        } // after a term has been added via AJAX	


        $(document).ajaxComplete(function (event, xhr, settings) {
          newNumberOfTags = $('#the-list').children('tr').length;

          if (parseInt(newNumberOfTags) > parseInt(numberOfTags)) {
            // refresh the actual number of tags variable
            numberOfTags = newNumberOfTags; // empty custom fields right here

            $('.fwplistivo-remove').each(function () {
              // empty hidden field
              $(this).next().val(''); // hide remove image button

              $(this).hide().prev().addClass('button').text('Upload image');
            });
          }
        });
      }
    }]);

    return FWPListivoBackendJS;
  }();

  new FWPListivoBackendJS();
})(jQuery);

/***/ }),

/***/ "./src/js/backend/notice.js":
/*!**********************************!*\
  !*** ./src/js/backend/notice.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

(function ($) {
  var FWProject_Notice = /*#__PURE__*/function () {
    function FWProject_Notice() {
      var _FWPsiteConfig$ajaxUr, _FWPsiteConfig, _FWPsiteConfig$ajax_n, _FWPsiteConfig2;

      _classCallCheck(this, FWProject_Notice);

      this.ajaxUrl = (_FWPsiteConfig$ajaxUr = (_FWPsiteConfig = FWPsiteConfig) === null || _FWPsiteConfig === void 0 ? void 0 : _FWPsiteConfig.ajaxUrl) !== null && _FWPsiteConfig$ajaxUr !== void 0 ? _FWPsiteConfig$ajaxUr : '';
      this.ajaxNonce = (_FWPsiteConfig$ajax_n = (_FWPsiteConfig2 = FWPsiteConfig) === null || _FWPsiteConfig2 === void 0 ? void 0 : _FWPsiteConfig2.ajax_nonce) !== null && _FWPsiteConfig$ajax_n !== void 0 ? _FWPsiteConfig$ajax_n : '';
      this.notice(); // 01775898205
      // Best Friend
    }

    _createClass(FWProject_Notice, [{
      key: "notice",
      value: function notice() {
        var thisClass = this;
        var x, c, s, a, ev, go;
        document.querySelectorAll('.fwp-notice--dismissible').forEach(function (e, i) {
          if (e.dataset.isHandled != true) {
            e.dataset.isHandled = true;
            var x = e.querySelector('.fwp-notice__dismiss');

            if (x) {
              x.addEventListener('click', function (event) {
                if (false !== (ev = x.dataset.events)) {
                  go = true;
                  ev = JSON.parse(ev); // console.log( ev );

                  if (ev.confirm) {
                    if (!confirm(ev.confirm)) {
                      go = false;
                    }
                  }

                  if (ev.request && ev.request.length >= 1 && ev.request.action && go) {
                    $.ajax({
                      url: thisClass.ajaxUrl,
                      type: 'post',
                      data: ev.request,
                      success: function success(response) {
                        thisClass.remove(x, e);
                      },
                      error: function error(response) {
                        console.log(response);
                      }
                    });
                  } else {
                    !go || thisClass.remove(x, e);
                  }
                }
              });
              c = e.querySelector('.fwp-notice__cancel');

              if (c) {
                c.addEventListener('click', function () {
                  return x.click();
                });
              }
            }
          }
        });
      }
    }, {
      key: "remove",
      value: function remove(x, e) {
        var _x$dataset$delay;

        var a; // Remove notice with little f trnasition effect.

        a = (_x$dataset$delay = x.dataset.delay) !== null && _x$dataset$delay !== void 0 ? _x$dataset$delay : 100;
        a = parseInt(a);
        e.style.opacity = 1;
        e.style.transition = 'opacity ' + a / 1000 + 's ease';
        e.style.opacity = 0;
        setTimeout(function () {
          return e.remove();
        }, a); // e.addEventListener( "transitionend", () => e.remove() } );
      }
    }]);

    return FWProject_Notice;
  }();

  new FWProject_Notice();
})(jQuery);

/***/ }),

/***/ "./src/sass/admin.scss":
/*!*****************************!*\
  !*** ./src/sass/admin.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ })

/******/ });
//# sourceMappingURL=admin.js.map