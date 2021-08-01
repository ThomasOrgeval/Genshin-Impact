/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/select.js ***!
  \********************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var _iterator = _createForOfIteratorHelper(document.querySelectorAll(".custom-select-wrapper")),
    _step;

try {
  for (_iterator.s(); !(_step = _iterator.n()).done;) {
    var dropdown = _step.value;
    dropdown.addEventListener('click', function () {
      this.querySelector('.custom-select').classList.toggle('open');
    });
  }
} catch (err) {
  _iterator.e(err);
} finally {
  _iterator.f();
}

var _iterator2 = _createForOfIteratorHelper(document.querySelectorAll(".custom-option")),
    _step2;

try {
  for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
    var option = _step2.value;
    option.addEventListener('click', function () {
      if (!this.classList.contains('selected')) {
        if (this.parentNode.querySelector('.custom-option.selected')) this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');
        this.classList.add('selected');
        this.closest('.custom-select').querySelector('.custom-select__trigger div').innerHTML = this.innerHTML;
      }
    });
  }
} catch (err) {
  _iterator2.e(err);
} finally {
  _iterator2.f();
}

window.addEventListener('click', function (e) {
  var _iterator3 = _createForOfIteratorHelper(document.querySelectorAll('.custom-select')),
      _step3;

  try {
    for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
      var select = _step3.value;

      if (!select.contains(e.target)) {
        select.classList.remove('open');
      }
    }
  } catch (err) {
    _iterator3.e(err);
  } finally {
    _iterator3.f();
  }
});
/******/ })()
;