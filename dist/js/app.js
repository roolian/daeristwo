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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
  // Check for click events on the navbar burger icon
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".navbar-burger").click(function () {
    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(".navbar-burger").toggleClass("is-active");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(".navbar-menu").toggleClass("is-active");
  });
  window.addEventListener("scroll", onScrollNavigation);
  if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(".parallax-slider").length) window.addEventListener("scroll", onScrollAnimations);
  if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(".parallax-bg").length) window.addEventListener("scroll", onScrollParallax);
  if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(".section-references").length) referenceInit();
});

function onScrollAnimations(e) {
  var nDefillement = window.pageYOffset;
  var bg = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".parallax-slider").find(".swiper-slide-bg");
  bg.css("backgroundPosition", "50%  " + nDefillement * 0.6 + "px");
  var content = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".parallax-slider").find(".swiper-slide-inner");
  content.css("top", nDefillement * 0.2 + "px");
}

function onScrollParallax(e) {
  var nDefillement = window.pageYOffset;
  var bg = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".parallax-bg");
  bg.css("backgroundPosition", "50%  " + nDefillement * 0.6 + "px");
}

function onScrollNavigation(e) {
  var nDefillement = window.pageYOffset;

  if (nDefillement > 280) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("#mainNavbar").addClass("pinned");
  } else {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("#mainNavbar").removeClass("pinned");
  }
}

function referenceInit() {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".ref-type-list li").on("click", onFilterReferences);
}

function onFilterReferences(e) {
  var type = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).data("type");
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).siblings().removeClass('on');
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).addClass('on');
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".ref-wraper").html("");
  console.log(type);
  jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({
    url: adminAjax,
    method: "POST",
    data: {
      action: "get_references",
      type: type
    },
    success: function success(response) {
      if (response.success) {
        //console.log(response.data);
        var content = jquery__WEBPACK_IMPORTED_MODULE_0___default()(response.data.html);
        content.hide();
        jquery__WEBPACK_IMPORTED_MODULE_0___default()(".ref-wraper").append(content);
        content.fadeIn('slow');
      } else {//console.log(response.data);
      }
    },
    error: function error(response) {
      console.log("Erreur…");
    }
  });
}

/***/ }),

/***/ "./assets/sass/app.scss":
/*!******************************!*\
  !*** ./assets/sass/app.scss ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/sass/plugins/elementor-daeris-addons/eda-styles-cards.scss":
/*!***************************************************************************!*\
  !*** ./assets/sass/plugins/elementor-daeris-addons/eda-styles-cards.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************************************************************!*\
  !*** multi ./assets/js/app.js ./assets/sass/app.scss ./assets/sass/plugins/elementor-daeris-addons/eda-styles-cards.scss ***!
  \***************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\www\oxygen\wp-content\themes\daeristwo\assets\js\app.js */"./assets/js/app.js");
__webpack_require__(/*! C:\www\oxygen\wp-content\themes\daeristwo\assets\sass\app.scss */"./assets/sass/app.scss");
module.exports = __webpack_require__(/*! C:\www\oxygen\wp-content\themes\daeristwo\assets\sass\plugins\elementor-daeris-addons\eda-styles-cards.scss */"./assets/sass/plugins/elementor-daeris-addons/eda-styles-cards.scss");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });