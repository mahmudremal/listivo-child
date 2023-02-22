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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/frontend/index.js":
/*!**********************************!*\
  !*** ./src/js/frontend/index.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

(function ($) {
  var FWPListivo_Frontend = /*#__PURE__*/function () {
    /**
     * Constructor
     */
    function FWPListivo_Frontend() {
      _classCallCheck(this, FWPListivo_Frontend);

      this.init();
      this.searchbar();
    }

    _createClass(FWPListivo_Frontend, [{
      key: "init",
      value: function init() {
        var thisClass = this;
        var mapInterval; // console.log( getIconComponent( 'QuickLogin' ) );
      }
    }, {
      key: "searchbar",
      value: function searchbar() {
        var text,
            id,
            par,
            node,
            form,
            elem = document.querySelectorAll('.searchbarLiquid .fields .category');
        form = document.querySelector('#fwp-listivo-nav-search');
        elem.forEach(function (el, ei) {
          text = el.querySelector('.category .touch-box input[type="text"]');
          id = el.querySelector('.category .touch-box input[type="hidden"]');
          node = document.querySelectorAll('.category .options ul li a');
          node.forEach(function (nl, ni) {
            nl.addEventListener('click', function (ne) {
              var _nl$dataset$title, _nl$dataset, _nl$dataset$id, _nl$dataset2;

              text.value = (_nl$dataset$title = (_nl$dataset = nl.dataset) === null || _nl$dataset === void 0 ? void 0 : _nl$dataset.title) !== null && _nl$dataset$title !== void 0 ? _nl$dataset$title : text.dataset.all;
              id.value = (_nl$dataset$id = (_nl$dataset2 = nl.dataset) === null || _nl$dataset2 === void 0 ? void 0 : _nl$dataset2.id) !== null && _nl$dataset$id !== void 0 ? _nl$dataset$id : 0;

              if (form) {
                var _nl$dataset$href, _nl$dataset3;

                form.action = (_nl$dataset$href = (_nl$dataset3 = nl.dataset) === null || _nl$dataset3 === void 0 ? void 0 : _nl$dataset3.href) !== null && _nl$dataset$href !== void 0 ? _nl$dataset$href : form.dataset.action;
              }

              if (text.value.length >= 10) {
                text.value = text.value.substr(0, 10) + '..';
              } // console.log( [ nl, this, nl ] );

            });
          });
        });
        document.querySelector('.search-mobile-btn').addEventListener('click', function (e) {
          document.querySelector('#fwp-listivo-nav-search').classList.toggle('mobile-view');
        });
      }
    }]);

    return FWPListivo_Frontend;
  }();

  new FWPListivo_Frontend();
})(typeof jQuery !== 'undefined' ? jQuery : false);

/***/ }),

/***/ "./src/js/frontend/map.js":
/*!********************************!*\
  !*** ./src/js/frontend/map.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

(function ($) {
  var FWPListivo_Map = /*#__PURE__*/function () {
    /**
     * Constructor
     */
    function FWPListivo_Map() {
      _classCallCheck(this, FWPListivo_Map);

      this.initializeMap();
    }

    _createClass(FWPListivo_Map, [{
      key: "initializeMap",
      value: function initializeMap() {
        var thisClass = this;
        var mapInterval, style, script;
        thisClass.mapID = 'fwplistivoamchartsmap';

        if (document.getElementById(thisClass.mapID)) {
          script = document.createElement('script');
          script.type = 'text/javascript'; // script.integrity = 'sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=';script.crossorigin = '';

          script.src = 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js';
          document.head.appendChild(script);
          style = document.createElement('link');
          style.rel = 'stylesheet'; // style.integrity = 'sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=';style.crossorigin = '';

          style.href = 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css';
          document.head.appendChild(style);
          mapInterval = setInterval(function () {
            if (typeof L !== 'undefined') {
              thisClass.leafletMap();
              clearInterval(mapInterval);
            }
          }, 1000);
        }
      }
    }, {
      key: "leafletMap",
      value: function leafletMap() {
        var thisClass = this;
        var mapInterval,
            style,
            script,
            scripts,
            marker,
            circle,
            polygon,
            popup,
            markers = [],
            Icons = {};
        var map = L.map(thisClass.mapID).setView([45.274886, 14.150391], 4);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var PinIcon = L.Icon.extend({
          options: {
            shadowUrl: false,
            // 'https://leafletjs.com/examples/custom-icons/leaf-green.png',
            iconSize: [38, 95],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76]
          }
        });
        Icons.pinPoint = new PinIcon({
          iconUrl: 'https://www.svgrepo.com/show/423397/pin-point.svg'
        });
        Icons.pinLocat = new PinIcon({
          iconUrl: 'https://www.svgrepo.com/show/435064/pin-location.svg'
        }); // var popup = L.marker([51.5, -0.09]).addTo(map).bindPopup('A pretty CSS3 popup.<br> Easily customizable.').openPopup();

        marker = L.marker([45.274886, 14.150391], {
          icon: Icons.pinLocat,
          alt: 'Dhaka'
        }).addTo(map); // var mapInterval = setInterval( () =>{
        // 	marker.setLatLng( [51.513, -0.19] )
        // }, 1000 );
        // circle = L.circle([51.508, -0.11], {
        // 	color: 'red',
        // 	fillColor: '#f03',
        // 	fillOpacity: 0.5,
        // 	radius: 500
        // }).addTo(map);
        // polygon = L.polygon([
        // 	[51.509, -0.08],
        // 	[51.503, -0.06],
        // 	[51.51, -0.047]
        // ]).addTo(map);
        // marker.bindPopup("<b>Hello world!</b><br>I am a popup.");
        // circle.bindPopup("I am a circle.");
        // polygon.bindPopup("I am a polygon.");

        popup = L.popup(); //.setLatLng([51.513, -0.09]).setContent("I am a standalone popup.").openOn(map);

        map.on('click', function (e) {
          markers.push(L.marker(e.latlng, {
            icon: Icons.pinPoint
          }).addTo(map).bindPopup("<b>This is!</b>a popup.")); // marker.setLatLng(e.latlng).bindPopup("<b>Location:</b><br>." + e.latlng.toString()).openPopup();
          // popup.setLatLng(e.latlng).setContent("You clicked the map at " + e.latlng.toString()).openOn(map);
          // console.log( e, e.latlng );
        });
        map.on('locationfound', function (e) {
          var radius = e.accuracy;
          L.marker(e.latlng).addTo(map).bindPopup("You are within " + radius + " meters from this point").openPopup();
          L.circle(e.latlng, radius).addTo(map);
        });
        map.on('locationerror', function (e) {
          marker.bindPopup("<b>Error:</b><br>." + e.message).openPopup();
        }); // map.locate({setView: true, maxZoom: 16}); // For getting current location of mine.
      }
    }, {
      key: "amchartsMap",
      value: function amchartsMap() {
        var thisClass = this;
        var mapInterval, style, script, scripts;
        scripts = [['amcharts-index', 'https://cdn.amcharts.com/lib/5/index.js'], ['amcharts-map', 'https://cdn.amcharts.com/lib/5/map.js'], ['amcharts-animated', 'https://cdn.amcharts.com/lib/5/themes/Animated.js'], ['amcharts-countries2', 'https://cdn.amcharts.com/lib/5/geodata/data/countries2.js']];
        scripts.forEach(function (e, i) {
          script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = e[1];
          script.id = e[0];
          document.head.appendChild(script);
        });
        mapInterval = setInterval(function () {
          // window.am5 && am5geodata_data_countries2
          if (typeof am5 !== 'undefined' && typeof am5geodata_data_countries2 !== 'undefined') {
            console.log(am5geodata_data_countries2);
            am5.ready(function () {
              clearInterval(mapInterval);
              thisClass.executeMapCanvas(am5);
            });
          }
        }, 1000);
      }
    }, {
      key: "executeMapCanvas",
      value: function executeMapCanvas(am5) {
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("fwplistivoamchartsmap"); // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/

        root.setThemes([am5themes_Animated.new(root)]); // Create the map chart
        // https://www.amcharts.com/docs/v5/charts/map-chart/

        var chart = root.container.children.push(am5map.MapChart.new(root, {
          panX: "rotateX",
          projection: am5map.geoMercator(),
          layout: root.horizontalLayout
        })); // am5.net.load("https://www.amcharts.com/tools/country/?v=xz6Z", chart).then(function (result) {
        // 	var geo = am5.JSONParser.parse(result.response);
        // 	thisClass.loadGeodata(geo.country_code);
        // });

        thisClass.loadGeodata('RU', chart); // Create polygon series for continents
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/

        var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
          calculateAggregates: true,
          valueField: "value"
        }));
        polygonSeries.mapPolygons.template.setAll({
          tooltipText: "{name}",
          interactive: true
        });
        polygonSeries.mapPolygons.template.states.create("hover", {
          fill: am5.color(0x677935)
        });
      }
    }, {
      key: "loadGeodata",
      value: function loadGeodata(country, chart) {
        // Default map
        var defaultMap = "usaLow";

        if (country == "US") {
          chart.set("projection", am5map.geoAlbersUsa());
        } else {
          chart.set("projection", am5map.geoMercator());
        } // calculate which map to be used


        var currentMap = defaultMap;
        var title = "";

        if (am5geodata_data_countries2[country] !== undefined) {
          currentMap = am5geodata_data_countries2[country]["maps"][0]; // add country title

          if (am5geodata_data_countries2[country]["country"]) {
            title = am5geodata_data_countries2[country]["country"];
          }
        }

        am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/" + currentMap + ".json", chart).then(function (result) {
          var geodata = am5.JSONParser.parse(result.response);
          var data = [];

          for (var i = 0; i < geodata.features.length; i++) {
            data.push({
              id: geodata.features[i].id,
              value: Math.round(Math.random() * 10000)
            });
          }

          polygonSeries.set("geoJSON", geodata);
          polygonSeries.data.setAll(data);
        });
        chart.seriesContainer.children.push(am5.Label.new(root, {
          x: 5,
          y: 5,
          text: title,
          background: am5.RoundedRectangle.new(root, {
            fill: am5.color(0xffffff),
            fillOpacity: 0.2
          })
        }));
      }
    }, {
      key: "images",
      value: function images() {
        /**
         * https://www.svgrepo.com/show/343873/shop-online-store-ecommerce.svg
         * https://www.svgrepo.com/show/343873/shop-online-store-ecommerce.svg
         * https://www.svgrepo.com/show/356957/shop.svg
         * 
         * https://www.svgrepo.com/show/448100/pin.svg
         * https://www.svgrepo.com/show/449529/pin.svg
         * https://www.svgrepo.com/show/447736/pin.svg
         * https://www.svgrepo.com/show/435065/pin-location-2.svg
         * https://www.svgrepo.com/show/435064/pin-location.svg
         * https://www.svgrepo.com/show/423397/pin-point.svg
         * https://www.svgrepo.com/show/423402/pin-stage.svg
         * 
         * https://www.svgrepo.com/show/374701/job-position.svg
         * https://www.svgrepo.com/show/374702/job-family.svg
         * https://www.svgrepo.com/show/170571/job-search.svg
         * 
         * https://www.svgrepo.com/show/408348/cart-shop-sell-buy.svg
         */
      }
    }]);

    return FWPListivo_Map;
  }();

  new FWPListivo_Map();
})(typeof jQuery !== 'undefined' ? jQuery : false);

/***/ }),

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _frontend__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./frontend */ "./src/js/frontend/index.js");
/* harmony import */ var _frontend__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_frontend__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _frontend_map__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./frontend/map */ "./src/js/frontend/map.js");
/* harmony import */ var _frontend_map__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_frontend_map__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../sass/main.scss */ "./src/sass/main.scss");
/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_sass_main_scss__WEBPACK_IMPORTED_MODULE_2__);

 // import './posts/loadmore';
// Styles

 // Images.
// import '../img/cats.jpg';
// import '../img/patterns/cover.jpg';
// Icons
// import '../icons/quicklogin.svg';

/***/ }),

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=main.js.map