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

/***/ "./resources/js/argon.js":
/*!*******************************!*\
  !*** ./resources/js/argon.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_license__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/license */ "./resources/js/components/license.js");
/* harmony import */ var _components_license__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_license__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_layout__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/layout */ "./resources/js/components/layout.js");
/* harmony import */ var _components_layout__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_layout__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_init_navbar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/init/navbar */ "./resources/js/components/init/navbar.js");
/* harmony import */ var _components_init_navbar__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_init_navbar__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_init_popover__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/init/popover */ "./resources/js/components/init/popover.js");
/* harmony import */ var _components_init_popover__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_components_init_popover__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _components_init_scroll_to__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/init/scroll-to */ "./resources/js/components/init/scroll-to.js");
/* harmony import */ var _components_init_scroll_to__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_components_init_scroll_to__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _components_init_tooltip__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/init/tooltip */ "./resources/js/components/init/tooltip.js");
/* harmony import */ var _components_init_tooltip__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_components_init_tooltip__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _components_custom_checklist__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/custom/checklist */ "./resources/js/components/custom/checklist.js");
/* harmony import */ var _components_custom_checklist__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_components_custom_checklist__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _components_custom_form_control__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./components/custom/form-control */ "./resources/js/components/custom/form-control.js");
/* harmony import */ var _components_custom_form_control__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_components_custom_form_control__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _components_vendor_datatable__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./components/vendor/datatable */ "./resources/js/components/vendor/datatable.js");
/* harmony import */ var _components_vendor_datatable__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_datatable__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _components_vendor_trix__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./components/vendor/trix */ "./resources/js/components/vendor/trix.js");
/* harmony import */ var _components_vendor_trix__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_trix__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _components_vendor_sweetalert__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./components/vendor/sweetalert */ "./resources/js/components/vendor/sweetalert.js");
/* harmony import */ var _components_vendor_sweetalert__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_sweetalert__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _components_vendor_form__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./components/vendor/form */ "./resources/js/components/vendor/form.js");
/* harmony import */ var _components_vendor_form__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_form__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _components_vendor_dropzone__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./components/vendor/dropzone */ "./resources/js/components/vendor/dropzone.js");
/* harmony import */ var _components_vendor_dropzone__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_dropzone__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _components_vendor_select2__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./components/vendor/select2 */ "./resources/js/components/vendor/select2.js");
/* harmony import */ var _components_vendor_select2__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_components_vendor_select2__WEBPACK_IMPORTED_MODULE_13__);

 // Init




 // Custom


 // Vendors








/***/ }),

/***/ "./resources/js/components/custom/checklist.js":
/*!*****************************************************!*\
  !*** ./resources/js/components/custom/checklist.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Checklist
//


var Checklist = function () {
  //
  // Variables
  //
  var $list = $('[data-toggle="checklist"]'); //
  // Methods
  //
  // Init

  function init($this) {
    var $checkboxes = $this.find('.checklist-entry input[type="checkbox"]');
    $checkboxes.each(function () {
      checkEntry($(this));
    });
  }

  function checkEntry($checkbox) {
    if ($checkbox.is(':checked')) {
      $checkbox.closest('.checklist-item').addClass('checklist-item-checked');
    } else {
      $checkbox.closest('.checklist-item').removeClass('checklist-item-checked');
    }
  } //
  // Events
  //
  // Init


  if ($list.length) {
    $list.each(function () {
      init($(this));
    });
    $list.find('input[type="checkbox"]').on('change', function () {
      checkEntry($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/custom/form-control.js":
/*!********************************************************!*\
  !*** ./resources/js/components/custom/form-control.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Form control
//


var FormControl = function () {
  // Variables
  var $input = $('.form-control'); // Methods

  function init($this) {
    $this.on('focus blur', function (e) {
      $(this).parents('.form-group').toggleClass('focused', e.type === 'focus');
    }).trigger('blur');
  } // Events


  if ($input.length) {
    init($input);
  }
}();

/***/ }),

/***/ "./resources/js/components/init/navbar.js":
/*!************************************************!*\
  !*** ./resources/js/components/init/navbar.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Navbar
//


var Navbar = function () {
  // Variables
  var $nav = $('.navbar-nav, .navbar-nav .nav');
  var $collapse = $('.navbar .collapse');
  var $dropdown = $('.navbar .dropdown'); // Methods

  function accordion($this) {
    $this.closest($nav).find($collapse).not($this).collapse('hide');
  }

  function closeDropdown($this) {
    var $dropdownMenu = $this.find('.dropdown-menu');
    $dropdownMenu.addClass('close');
    setTimeout(function () {
      $dropdownMenu.removeClass('close');
    }, 200);
  } // Events


  $collapse.on({
    'show.bs.collapse': function showBsCollapse() {
      accordion($(this));
    }
  });
  $dropdown.on({
    'hide.bs.dropdown': function hideBsDropdown() {
      closeDropdown($(this));
    }
  });
}(); //
// Navbar collapse
//


var NavbarCollapse = function () {
  // Variables
  var $nav = $('.navbar-nav'),
      $collapse = $('.navbar .navbar-custom-collapse'); // Methods

  function hideNavbarCollapse($this) {
    $this.addClass('collapsing-out');
  }

  function hiddenNavbarCollapse($this) {
    $this.removeClass('collapsing-out');
  } // Events


  if ($collapse.length) {
    $collapse.on({
      'hide.bs.collapse': function hideBsCollapse() {
        hideNavbarCollapse($collapse);
      }
    });
    $collapse.on({
      'hidden.bs.collapse': function hiddenBsCollapse() {
        hiddenNavbarCollapse($collapse);
      }
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/init/popover.js":
/*!*************************************************!*\
  !*** ./resources/js/components/init/popover.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Popover
//


var Popover = function () {
  // Variables
  var $popover = $('[data-toggle="popover"]'),
      $popoverClass = ''; // Methods

  function init($this) {
    if ($this.data('color')) {
      $popoverClass = 'popover-' + $this.data('color');
    }

    var options = {
      trigger: 'focus',
      template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
    };
    $this.popover(options);
  } // Events


  if ($popover.length) {
    $popover.each(function () {
      init($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/init/scroll-to.js":
/*!***************************************************!*\
  !*** ./resources/js/components/init/scroll-to.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Scroll to (anchor links)
//


var ScrollTo = function () {
  //
  // Variables
  //
  var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a'); //
  // Methods
  //

  function scrollTo($this) {
    var $el = $this.attr('href');
    var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
    var options = {
      scrollTop: $($el).offset().top - offset
    }; // Animate scroll to the selected section

    $('html, body').stop(true, true).animate(options, 600);
    event.preventDefault();
  } //
  // Events
  //


  if ($scrollTo.length) {
    $scrollTo.on('click', function (event) {
      scrollTo($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/init/tooltip.js":
/*!*************************************************!*\
  !*** ./resources/js/components/init/tooltip.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Tooltip
//


var Tooltip = function () {
  // Variables
  var $tooltip = $('[data-toggle="tooltip"]'); // Methods

  function init() {
    $tooltip.tooltip();
  } // Events


  if ($tooltip.length) {
    init();
  }
}();

/***/ }),

/***/ "./resources/js/components/layout.js":
/*!*******************************************!*\
  !*** ./resources/js/components/layout.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// Layout
//


var Layout = function () {
  function pinSidenav() {
    $('.sidenav-toggler').addClass('active');
    $('.sidenav-toggler').data('action', 'sidenav-unpin');
    $('body').removeClass('g-sidenav-hidden').addClass('g-sidenav-show g-sidenav-pinned');
    $('body').append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target=' + $('#sidenav-main').data('target') + ' />'); // Store the sidenav state in a cookie session

    Cookies.set('sidenav-state', 'pinned');
  }

  function unpinSidenav() {
    $('.sidenav-toggler').removeClass('active');
    $('.sidenav-toggler').data('action', 'sidenav-pin');
    $('body').removeClass('g-sidenav-pinned').addClass('g-sidenav-hidden');
    $('body').find('.backdrop').remove(); // Store the sidenav state in a cookie session

    Cookies.set('sidenav-state', 'unpinned');
  } // Set sidenav state from cookie


  var $sidenavState = Cookies.get('sidenav-state') ? Cookies.get('sidenav-state') : 'pinned';

  if ($(window).width() > 1200) {
    if ($sidenavState == 'pinned') {
      pinSidenav();
    }

    if (Cookies.get('sidenav-state') == 'unpinned') {
      unpinSidenav();
    }

    $(window).resize(function () {
      if ($('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
        $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
      }
    });
  }

  if ($(window).width() < 1200) {
    $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
    $('body').removeClass('g-sidenav-show');
    $(window).resize(function () {
      if ($('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
        $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
      }
    });
  }

  $("body").on("click", "[data-action]", function (e) {
    e.preventDefault();
    var $this = $(this);
    var action = $this.data('action');
    var target = $this.data('target'); // Manage actions

    switch (action) {
      case 'sidenav-pin':
        pinSidenav();
        break;

      case 'sidenav-unpin':
        unpinSidenav();
        break;

      case 'search-show':
        target = $this.data('target');
        $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-showing');
        setTimeout(function () {
          $('body').removeClass('g-navbar-search-showing').addClass('g-navbar-search-show');
        }, 150);
        setTimeout(function () {
          $('body').addClass('g-navbar-search-shown');
        }, 300);
        break;

      case 'search-close':
        target = $this.data('target');
        $('body').removeClass('g-navbar-search-shown');
        setTimeout(function () {
          $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-hiding');
        }, 150);
        setTimeout(function () {
          $('body').removeClass('g-navbar-search-hiding').addClass('g-navbar-search-hidden');
        }, 300);
        setTimeout(function () {
          $('body').removeClass('g-navbar-search-hidden');
        }, 500);
        break;
    }
  }); // Add sidenav modifier classes on mouse events

  $('.sidenav').on('mouseenter', function () {
    if (!$('body').hasClass('g-sidenav-pinned')) {
      $('body').removeClass('g-sidenav-hide').removeClass('g-sidenav-hidden').addClass('g-sidenav-show');
    }
  });
  $('.sidenav').on('mouseleave', function () {
    if (!$('body').hasClass('g-sidenav-pinned')) {
      $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hide');
      setTimeout(function () {
        $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
      }, 300);
    }
  }); // Make the body full screen size if it has not enough content inside

  $(window).on('load resize', function () {
    if ($('body').height() < 800) {
      $('body').css('min-height', '100vh');
      $('#footer-main').addClass('footer-auto-bottom');
    }
  });
}();

/***/ }),

/***/ "./resources/js/components/license.js":
/*!********************************************!*\
  !*** ./resources/js/components/license.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*!

=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

/***/ }),

/***/ "./resources/js/components/vendor/datatable.js":
/*!*****************************************************!*\
  !*** ./resources/js/components/vendor/datatable.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var dt = function () {
  // Variables
  var datatable = $('.dataTables_wrapper'),
      buttons = $('.dt-buttons', datatable),
      dtHead = $('thead', datatable); // Methods

  function init($this) {
    $this.removeClass('btn-group').find('.btn').removeClass('btn-secondary').addClass('btn-sm btn-default');
    $('.btn', $this).each(function (index, btn) {
      btn = $(btn);
      var span = $('span > span', btn);
      var title = span.text();
      span.remove();
      btn.attr('title', title).tooltip({
        'placement': 'bottom'
      });
    });
  }

  function addTHeadClasses(head) {
    head.addClass('thead-light');
  }

  function makeFilterLabelAsPlaceholder(label) {
    var text = label.find('span').text();
    label.find('span').remove();
    label.find('input').attr('placeholder', text);
  } // Events


  if (datatable.length) {
    init(buttons);

    if (dtHead.length) {
      addTHeadClasses(dtHead);
    }

    if ($('.dataTables_filter', datatable).length) {
      makeFilterLabelAsPlaceholder($('.dataTables_filter', datatable));
    }
  }
}();

/***/ }),

/***/ "./resources/js/components/vendor/dropzone.js":
/*!****************************************************!*\
  !*** ./resources/js/components/vendor/dropzone.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var Dropzones = function () {
  // Variables
  var $dropzone = $('[data-toggle="dropzone"]');
  var $dropzonePreview = $('.dz-preview'); // Methods

  function init($this) {
    var multiple = $this.data('dropzone-multiple') !== undefined ? true : false;
    var deleteUrl = $this.data('delete');
    var preview = $this.find($dropzonePreview);
    var acceptedFiles = $this.data('accept');
    var maxFiles = $this.data('max-files');
    var currentFiles = $this.data('files');
    var defaultFile = $this.data('default');
    var dictDefaultMessage = $this.data('label');
    var headers = {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    var inputName = $this.data('name');
    var currentFile = undefined;
    var uploadedMap = {};
    var fileInputName = 'file';

    if (inputName) {
      fileInputName = inputName;
    }

    fileInputName += multiple ? '[]' : ''; // Init options

    var options = {
      url: $this.data('dropzone-url'),
      thumbnailWidth: null,
      thumbnailHeight: null,
      previewsContainer: preview.get(0),
      previewTemplate: preview.html(),
      maxFiles: !multiple ? 1 : maxFiles,
      acceptedFiles: acceptedFiles,
      dictDefaultMessage: dictDefaultMessage,
      headers: headers,
      init: function init() {
        this.on("addedfile", function (file) {
          if (!multiple && currentFile) {
            this.options.maxFiles = 1;
            this.removeFile(currentFile);
          }

          currentFile = file;
        });

        if (currentFiles) {
          var _iterator = _createForOfIteratorHelper(currentFiles),
              _step;

          try {
            for (_iterator.s(); !(_step = _iterator.n()).done;) {
              var mock = _step.value;
              this.displayExistingFile(mock, mock.url);
            }
          } catch (err) {
            _iterator.e(err);
          } finally {
            _iterator.f();
          }

          this.options.maxFiles = this.options.maxFiles - currentFiles.length;

          if (this.options.maxFiles === 0) {
            this._updateMaxFilesReachedClass();
          }
        }

        if (defaultFile && !currentFiles) {
          var _mock = {
            url: defaultFile
          };
          this.displayExistingFile(_mock, _mock.url);
        }
      },
      success: function success(file, response) {
        $this.after('<input type="hidden" name="' + fileInputName + '" value="' + response.name + '">');
        uploadedMap[file.name] = response.name;
      },
      removedfile: function removedfile(file) {
        var name = uploadedMap[file.name];
        file.previewElement.remove();

        if (deleteUrl) {
          $.ajax({
            url: deleteUrl,
            type: "DELETE",
            data: {
              name: file.name
            },
            headers: headers
          });
        }

        $this.nextAll('input[name="' + fileInputName + '"][value="' + name + '"]').remove();
      }
    }; // Clear preview html

    preview.html(''); // Init dropzone

    $this.dropzone(options);
  }

  function globalOptions() {
    Dropzone.autoDiscover = false;
  } // Events


  if ($dropzone.length) {
    globalOptions();
    $dropzone.each(function () {
      init($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/vendor/form.js":
/*!************************************************!*\
  !*** ./resources/js/components/vendor/form.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var form = function () {
  // Variables
  var submitBtn = $('.action-submit'); // Methods

  function submit(event) {
    var btn = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

    if (!btn) {
      btn = $(this);
    }

    btn.prop("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');
    $(btn.attr('data-form')).submit();
  } // Events


  if (submitBtn.length) {
    submitBtn.on('click', submit);
    $(document).keypress(function (event) {
      var code = event.keyCode ? event.keyCode : event.which;

      if (code === 13) {
        submit(event, $(this).closest('.action-submit'));
      }
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/vendor/select2.js":
/*!***************************************************!*\
  !*** ./resources/js/components/vendor/select2.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Select2 = function () {
  // Variables
  var $select = $('[data-toggle="select"]'); // Methods

  function init($this) {
    var options = {// dropdownParent: $this.closest('.modal').length ? $this.closest('.modal') : $(document.body),
      // minimumResultsForSearch: $this.data('minimum-results-for-search'),
      // templateResult: formatAvatar
    };
    $this.select2(options);
  } // Events


  if ($select.length) {
    $select.each(function () {
      init($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/js/components/vendor/sweetalert.js":
/*!******************************************************!*\
  !*** ./resources/js/components/vendor/sweetalert.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var sweetAlert = function () {
  // Methods
  function deleteBtn(event) {
    event.preventDefault();
    var btn = $(this);
    Swal.fire({
      type: 'warning',
      confirmButtonColor: 'var(--danger)',
      cancelButtonColor: 'var(--light)',
      showLoaderOnConfirm: true,
      allowOutsideClick: false,
      allowEscapeKey: false,
      showCancelButton: true,
      title: btn.attr('data-modal-title'),
      text: btn.attr('data-modal-text'),
      confirmButtonText: btn.attr('data-confirm'),
      cancelButtonText: btn.attr('data-cancel'),
      preConfirm: function preConfirm() {
        btn.parents('form').submit();
        return new Promise(function (resolve) {
          setTimeout(function () {
            resolve();
          }, 5000);
        });
      }
    });
  } // Events


  $(document).on('click', '.table-action-delete, .action-delete', deleteBtn);
}();

/***/ }),

/***/ "./resources/js/components/vendor/trix.js":
/*!************************************************!*\
  !*** ./resources/js/components/vendor/trix.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Trix = function () {
  // Variables
  var $trix = $('trix-editor'); // Methods

  function init($this) {
    var storeUrl = $this.data('store-url');
    var deleteUrl = $this.data('delete-url');
    var headers = {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    $this.on('trix-attachment-add', function (event) {
      event = event.originalEvent;
      var attachment = event.attachment;
      var file = attachment.file;
      var form = new FormData();
      form.append('Content-Type', file.type);
      form.append('file', file);
      $.ajax({
        type: 'POST',
        url: storeUrl,
        data: form,
        contentType: false,
        processData: false,
        headers: headers,
        xhr: function xhr() {
          var xhr = new window.XMLHttpRequest();

          xhr.upload.onprogress = function (event) {
            attachment.setUploadProgress(event.loaded / event.total * 100);
          };

          return xhr;
        },
        success: function success(data) {
          attachment.setAttributes({
            filename: data.name,
            url: data.url
          });
        }
      });
    });
    $this.on('trix-attachment-remove', function (event) {
      event = event.originalEvent;
      var name = event.attachment.attachment.attributes.values.filename;
      $.ajax({
        url: deleteUrl,
        type: "DELETE",
        data: {
          name: name
        },
        headers: headers
      });
    });
  } // Events


  if ($trix.length) {
    $trix.each(function () {
      init($(this));
    });
  }
}();

/***/ }),

/***/ "./resources/scss/argon.scss":
/*!***********************************!*\
  !*** ./resources/scss/argon.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************!*\
  !*** multi ./resources/js/argon.js ./resources/scss/argon.scss ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\Workspace\web\packages\packages\microboard-v2\resources\js\argon.js */"./resources/js/argon.js");
module.exports = __webpack_require__(/*! D:\Workspace\web\packages\packages\microboard-v2\resources\scss\argon.scss */"./resources/scss/argon.scss");


/***/ })

/******/ });