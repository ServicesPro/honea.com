
//version un peu compatible avec les ancienne version de iexplorer



"use strict";

const { create } = require("lodash");

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function animateAsync(element, keyframes, options) {
    return new Promise(function (res) {
        var anim = element.animate(keyframes, options); // anim.onfinish = res; <- not supported on Safari

        setTimeout(res, options.duration || 0);
    });
}

function createImageSlider(images) {
    var _ref = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
        _ref$currentSlideInde = _ref.currentSlideIndex,
        currentSlideIndex = _ref$currentSlideInde === void 0 ? 0 : _ref$currentSlideInde,
        _ref$duration = _ref.duration,
        duration = _ref$duration === void 0 ? 500 : _ref$duration,
        _ref$easing = _ref.easing,
        easing = _ref$easing === void 0 ? 'cubic-bezier(0.250, 1.0, 0.5, 1.0)' : _ref$easing,
        _ref$slideShowInterva = _ref.slideShowInterval,
        slideShowInterval = _ref$slideShowInterva === void 0 ? 5000 : _ref$slideShowInterva;

    var slider = document.querySelector(".mySlider");

    var _slider$children = _slicedToArray(slider.children, 4),
        wrapper = _slider$children[0],
        indicators = _slider$children[1],
        prevBtn = _slider$children[2],
        nextBtn = _slider$children[3];

    var fill = 'forwards';
    var animating = false;
    var timer = null;
    images.forEach(function (img, idx) {
        var slide = document.querySelector('.slido');
        var btn = document.querySelector('.slide-indicators button');
        var image = document.createElement('img');
        var activeCls = idx === currentSlideIndex ? 'active' : '';
        slide.className = "slido ".concat(activeCls);
        btn.className = activeCls;
        image.src = img;
        btn.style.transitionDuration = "".concat(duration, "ms");
        btn.addEventListener('click', function () {
            return slideTo(idx);
        });
        slide.appendChild(image);
        wrapper.appendChild(slide);
        indicators.appendChild(btn);
    });

    function autoSlide() {
        timer = setTimeout(function () {
            return slideTo(currentSlideIndex === images.length - 1 ? 0 : currentSlideIndex + 1);
        }, slideShowInterval);
    }

    function slideTo(index) {
        if (index === currentSlideIndex || animating) {
            return;
        }

        animating = true;
        clearTimeout(timer);
        var currentSlide = wrapper.children[currentSlideIndex];
        var nextSlide = wrapper.children[index];
        indicators.children[currentSlideIndex].classList.remove('active');
        indicators.children[index].classList.add('active');
        var pos = index > currentSlideIndex ? '-100%' : '100%';
        Promise.all([animateAsync(nextSlide, [{
            transform: "translate(".concat(parseInt(pos, 10) * -1, "%, 0)")
        }, {
            transform: 'translate(0, 0)'
        }], {
            duration: duration,
            fill: fill,
            easing: easing
        }), animateAsync(currentSlide, [{
            transform: 'translate(0, 0)'
        }, {
            transform: "translate(".concat(pos, ", 0)")
        }], {
            duration: duration,
            fill: fill,
            easing: easing
        })]).then(function () {
            currentSlideIndex = index;
            currentSlide.classList.remove('active');
            nextSlide.classList.add('active');
            animating = false;
            autoSlide();
        }).catch(function (error) {
            console.log(error)
        });
    }

    ;
    nextBtn.addEventListener('click', function () {
        return slideTo(Math.min(currentSlideIndex + 1, images.length - 1));
    });
    prevBtn.addEventListener('click', function () {
        return slideTo(Math.max(0, currentSlideIndex - 1));
    });
    autoSlide();
    return slider;
}


