"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*модалки */
var bfmodal =
/*#__PURE__*/
function () {
  function bfmodal(props) {
    _classCallCheck(this, bfmodal);

    var defaultConfig = {
      backscroll: true,
      linkAttributeName: 'data-bfmodal',
      closeOnOverlay: true,
      closeOnEsc: true,
      closeOnButton: true,
      waitTransitions: false,
      catchFocus: true,
      fixedSelectors: '*[data-hystfixed]',
      beforeOpen: function beforeOpen() {},
      afterClose: function afterClose() {}
    };
    this.config = Object.assign(defaultConfig, props);

    if (this.config.linkAttributeName) {
      this.init();
    }

    this._closeAfterTransition = this._closeAfterTransition.bind(this);
  }

  _createClass(bfmodal, [{
    key: "init",
    value: function init() {
      this.isOpened = false;
      this.openedWindow = false;
      this.starter = false;
      this._nextWindows = false;
      this._scrollPosition = 0;
      this._reopenTrigger = false;
      this._overlayChecker = false;
      this._isMoved = false;
      this._focusElements = ['a[href]', 'area[href]', 'input:not([disabled]):not([type="hidden"]):not([aria-hidden])', 'select:not([disabled]):not([aria-hidden])', 'textarea:not([disabled]):not([aria-hidden])', 'button:not([disabled]):not([aria-hidden])', 'iframe', 'object', 'embed', '[contenteditable]', '[tabindex]:not([tabindex^="-"])'];
      this._modalBlock = false;
      var existingShadow = document.querySelector('.bfmodal__shadow');

      if (existingShadow) {
        this.shadow = existingShadow;
      } else {
        this.shadow = document.createElement('div');
        this.shadow.classList.add('bfmodal__shadow');
        document.body.appendChild(this.shadow);
      }

      this.eventsFeeler();
    }
  }, {
    key: "eventsFeeler",
    value: function eventsFeeler() {
      var _this = this;

      document.addEventListener('click', function (e) {
        var clickedlink = e.target.closest("[".concat(_this.config.linkAttributeName, "]"));

        if (!_this._isMoved && clickedlink) {
          e.preventDefault();
          _this.starter = clickedlink;

          var targetSelector = _this.starter.getAttribute(_this.config.linkAttributeName);

          _this._nextWindows = document.querySelector(targetSelector);

          _this.open();

          return;
        }

        if (_this.config.closeOnButton && e.target.closest('[data-hystclose]')) {
          _this.close();
        }
      });

      if (this.config.closeOnOverlay) {
        document.addEventListener('mousedown', function (e) {
          if (!_this._isMoved && e.target instanceof Element && !e.target.classList.contains('bfmodal__wrap')) return;
          _this._overlayChecker = true;
        });
        document.addEventListener('mouseup', function (e) {
          if (!_this._isMoved && e.target instanceof Element && _this._overlayChecker && e.target.classList.contains('bfmodal__wrap')) {
            e.preventDefault();
            _this._overlayChecker = !_this._overlayChecker;

            _this.close();

            return;
          }

          _this._overlayChecker = false;
        });
      }

      window.addEventListener('keydown', function (e) {
        if (!_this._isMoved && _this.config.closeOnEsc && e.which === 27 && _this.isOpened) {
          e.preventDefault();

          _this.close();

          return;
        }

        if (!_this._isMoved && _this.config.catchFocus && e.which === 9 && _this.isOpened) {
          _this.focusCatcher(e);
        }
      });
    }
  }, {
    key: "open",
    value: function open(selector) {
      if (selector) {
        if (typeof selector === 'string') {
          this._nextWindows = document.querySelector(selector);
        } else {
          this._nextWindows = selector;
        }
      }

      if (!this._nextWindows) {
        console.log('Warning: bfmodal selector is not found');
        return;
      }

      if (this.isOpened) {
        this._reopenTrigger = true;
        this.close();
        return;
      }

      this.openedWindow = this._nextWindows;
      this._modalBlock = this.openedWindow.querySelector('.bfmodal__window');
      this.config.beforeOpen(this);

      this._bodyScrollControl();

      this.shadow.classList.add('bfmodal__shadow--show');
      this.openedWindow.classList.add('bfmodal--active');
      this.openedWindow.setAttribute('aria-hidden', 'false');
      if (this.config.catchFocus) this.focusControl();
      this.isOpened = true;
    }
  }, {
    key: "close",
    value: function close() {
      if (!this.isOpened) {
        return;
      }

      if (this.config.waitTransitions) {
        this.openedWindow.classList.add('bfmodal--moved');
        this._isMoved = true;
        this.openedWindow.addEventListener('transitionend', this._closeAfterTransition);
        this.openedWindow.classList.remove('bfmodal--active');
      } else {
        this.openedWindow.classList.remove('bfmodal--active');

        this._closeAfterTransition();
      }
    }
  }, {
    key: "_closeAfterTransition",
    value: function _closeAfterTransition() {
      this.openedWindow.classList.remove('bfmodal--moved');
      this.openedWindow.removeEventListener('transitionend', this._closeAfterTransition);
      this._isMoved = false;
      this.shadow.classList.remove('bfmodal__shadow--show');
      this.openedWindow.setAttribute('aria-hidden', 'true');
      if (this.config.catchFocus) this.focusControl();

      this._bodyScrollControl();

      this.isOpened = false;
      this.openedWindow.scrollTop = 0;
      this.config.afterClose(this);

      if (this._reopenTrigger) {
        this._reopenTrigger = false;
        this.open();
      }
    }
  }, {
    key: "focusControl",
    value: function focusControl() {
      var nodes = this.openedWindow.querySelectorAll(this._focusElements);

      if (this.isOpened && this.starter) {
        this.starter.focus();
      } else if (nodes.length) nodes[0].focus();
    }
  }, {
    key: "focusCatcher",
    value: function focusCatcher(e) {
      var nodes = this.openedWindow.querySelectorAll(this._focusElements);
      var nodesArray = Array.prototype.slice.call(nodes);

      if (!this.openedWindow.contains(document.activeElement)) {
        nodesArray[0].focus();
        e.preventDefault();
      } else {
        var focusedItemIndex = nodesArray.indexOf(document.activeElement);

        if (e.shiftKey && focusedItemIndex === 0) {
          nodesArray[nodesArray.length - 1].focus();
          e.preventDefault();
        }

        if (!e.shiftKey && focusedItemIndex === nodesArray.length - 1) {
          nodesArray[0].focus();
          e.preventDefault();
        }
      }
    }
  }, {
    key: "_bodyScrollControl",
    value: function _bodyScrollControl() {
      if (!this.config.backscroll) return; // collect fixed selectors to array

      var fixedSelectorsElems = document.querySelectorAll(this.config.fixedSelectors);
      var fixedSelectors = Array.prototype.slice.call(fixedSelectorsElems);
      var html = document.documentElement;

      if (this.isOpened === true) {
        html.classList.remove('bfmodal__opened');
        html.style.marginRight = '';
        fixedSelectors.forEach(function (el) {
          el.style.marginRight = '';
        });
        window.scrollTo(0, this._scrollPosition);
        html.style.top = '';
        return;
      }

      this._scrollPosition = window.pageYOffset;
      var marginSize = window.innerWidth - html.clientWidth;
      html.style.top = "".concat(-this._scrollPosition, "px");

      if (marginSize) {
        html.style.marginRight = "".concat(marginSize, "px");
        fixedSelectors.forEach(function (el) {
          el.style.marginRight = "".concat(parseInt(getComputedStyle(el).marginRight, 10) + marginSize, "px");
        });
      }

      html.classList.add('bfmodal__opened');
    }
  }]);

  return bfmodal;
}();

var myModal = new bfmodal({
  catchFocus: true,
  closeOnEsc: true,
  backscroll: true,
  beforeOpen: function beforeOpen(modal) {// console.log('Message before opening the modal');
    // console.log(modal);
  },
  afterClose: function afterClose(modal) {
    // console.log('Message after modal has closed');
    // console.log(modal);
    var videoframe = modal.openedWindow.querySelector('iframe');

    if (videoframe) {
      videoframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
    }
  }
}); // липкая шапка

var header = jQuery('.header'),
    scrollPrev = 0;
var menuElem = jQuery('.header'),
    menuFixed = 100,
    menuStatus = false;
jQuery(window).on('scroll', function () {
  var scrolled = jQuery(window).scrollTop();

  if (scrolled > 10) {
    header.addClass('fixed');
  } else if (scrolled > scrollPrev) {
    header.removeClass('fixed');
  } else {
    header.removeAttr('style').removeClass('fixed');
  }

  scrollPrev = scrolled;
});
jQuery("#hamburger").on('click', function () {
  jQuery(this).toggleClass("open");
  jQuery("#header-nav").toggleClass('open');
});
jQuery(document).ready(function ($) {
  $('.main-menu-item.active').append("<div class='wee'></div>");

  if ($('.main-menu-item.active').length) {
    var $thisnav = $('.main-menu-item.active').offset().left;
    $('.main-menu-item').hover(function () {
      var $left = $(this).offset().left - $thisnav;
      var $width = $(this).outerWidth();
      var $start = 0;
      $('.wee').css({
        'left': $left,
        'width': $width
      });
    }, function () {
      var $initwidth = $('.main-menu-item.active').width();
      $('.wee').css({
        'left': '0',
        'width': $initwidth
      });
    });
  }

  $('.header-links__item').on('click', function () {
    $(this).toggleClass('active');
  });
}); //подвигаем эллипсы

var items = document.querySelectorAll('.blobs img');
var layer = document.querySelector('.blobs');
items.forEach(function (item) {
  return requestAnimationFrame(function () {
    return move(item);
  });
});

function move(el) {
  var s = Math.random() > 0.5 ? 1 : -1;
  var x = s * (Math.random() * 20);
  var y = s * (Math.random() * 20);
  var td = Math.random() * 8 + 1;
  el.style.transitionDuration = "".concat(td, "s");
  el.style.transform = "translate3d(".concat(x, "px, ").concat(y, "px, 0)");
  setTimeout(function () {
    requestAnimationFrame(function () {
      return move(el);
    });
  }, td * 1000);
}
/*карусель*/


var autoSwap = setInterval(swap, 3500);
jQuery('.carousel, span').hover(function () {
  clearInterval(autoSwap);
}, function () {
  autoSwap = setInterval(swap, 3500);
});
var items = [];
var startItem = 1;
var position = 0;
var itemCount = jQuery('.carousel li.carusel__item').length;
var leftpos = itemCount;
var resetCount = itemCount;
jQuery('li.carusel__item').each(function (index) {
  items[index] = jQuery(this).text();
});

function swap(action) {
  var direction = action;

  if (direction == 'counter-clockwise') {
    var leftitem = $('.left-pos').attr('id') - 1;

    if (leftitem == 0) {
      leftitem = itemCount;
    }

    jQuery('.right-pos').removeClass('right-pos').addClass('back-pos');
    jQuery('.main-pos').removeClass('main-pos').addClass('right-pos');
    jQuery('.left-pos').removeClass('left-pos').addClass('main-pos');
    jQuery('#' + leftitem + '').removeClass('back-pos').addClass('left-pos');
    startItem--;

    if (startItem < 1) {
      startItem = itemCount;
    }
  }

  if (direction == 'clockwise' || direction == '' || direction == null) {
    var pos = function pos(positionvalue) {
      if (positionvalue != 'leftposition') {
        position++;

        if (startItem + position > resetCount) {
          position = 1 - startItem;
        }
      }

      if (positionvalue == 'leftposition') {
        position = startItem - 1;

        if (position < 1) {
          position = itemCount;
        }
      }

      return position;
    };

    jQuery('#' + startItem + '').removeClass('main-pos').addClass('left-pos');
    jQuery('#' + (startItem + pos()) + '').removeClass('right-pos').addClass('main-pos');
    jQuery('#' + (startItem + pos()) + '').removeClass('back-pos').addClass('right-pos');
    jQuery('#' + pos('leftposition') + '').removeClass('left-pos').addClass('back-pos');
    startItem++;
    position = 0;

    if (startItem > itemCount) {
      startItem = 1;
    }

    jQuery('.paginate__item').removeClass('active');
    var id = jQuery(".main-pos").attr("id");
  }

  jQuery('[data-id =' + id + ' ]').addClass('active');
}

jQuery('#next').click(function () {
  swap('clockwise');
});
jQuery('#prev').click(function () {
  swap('counter-clockwise');
});
jQuery('li.carusel__item').click(function () {
  if ($(this).attr('class') == 'carusel__item left-pos') {
    swap('counter-clockwise');
  } else {
    swap('clockwise');
  }
});

if (document.getElementById("splide-doctors")) {
  var banner = document.getElementById('splide-doctors');
  var splide = new Splide(banner, {
    type: 'loop',
    perPage: 4,
    perMove: 1,
    autoplay: false,
    pauseOnHover: true,
    pauseOnFocus: true,
    arrows: true,
    pagination: false,
    breakpoints: {
      380: {
        perPage: 1
      },
      820: {
        perPage: 2
      }
    }
  });
  splide.on('mounted', function () {
    // if fewer slides than provided in options, set option to the number of slides
    if (splide.length <= splide.options.perPage) {
      splide.options.perPage = splide.length;
    }
  });
  splide.mount();
}

if (document.getElementById("splide-news")) {
  var banner = document.getElementById('splide-news');
  var splide1 = new Splide(banner, {
    type: 'loop',
    perPage: 3,
    perMove: 1,
    autoplay: true,
    pauseOnHover: true,
    pauseOnFocus: true,
    arrows: false,
    pagination: false,
    breakpoints: {
      380: {
        perPage: 1
      },
      820: {
        perPage: 2
      }
    }
  });
  splide1.on('mounted', function () {
    // if fewer slides than provided in options, set option to the number of slides
    if (splide1.length <= splide1.options.perPage) {
      splide1.options.perPage = splide1.length;
    }
  });
  splide1.mount();
  var btnNext = document.getElementById('arrow-news--next');
  var btnPrev = document.getElementById('arrow-news--prev');
  btnNext.addEventListener('click', function (e) {
    splide1.go('+1');
  });
  btnPrev.addEventListener('click', function (e) {
    splide1.go('-1');
  });
}

if (document.getElementById("splide-reviews")) {
  var banner = document.getElementById('splide-reviews');
  var splide = new Splide(banner, {
    type: 'slide',
    perPage: 3,
    perMove: 1,
    autoplay: true,
    pauseOnHover: true,
    pauseOnFocus: true,
    arrows: false,
    pagination: false,
    classes: {
      // Add classes for arrows.
      arrows: 'splide__arrows reviews-class-arrows',
      arrow: 'splide__arrow reviews-class-arrow',
      prev: 'splide__arrow--prev reviews-class-prev',
      next: 'splide__arrow--next reviews-class-next'
    },
    breakpoints: {
      380: {
        perPage: 1
      },
      820: {
        perPage: 2
      }
    }
  });
  splide.on('mounted', function () {
    // if fewer slides than provided in options, set option to the number of slides
    if (splide.length <= splide.options.perPage) {
      splide.options.perPage = splide.length;
    }
  });
  splide.mount(); //attach events to custom buttons

  var btnNext = document.getElementById('arrow-reviews--next');
  var btnPrev = document.getElementById('arrow-reviews--prev');
  btnNext.addEventListener('click', function (e) {
    splide.go('+1');
  });
  btnPrev.addEventListener('click', function (e) {
    splide.go('-1');
  });
}

jQuery(document).ready(function ($) {
  // Используем делегирование событий
  $(document).on('click', 'a[href="#"]', function (event) {
    event.preventDefault(); // Отменяем стандартное поведение ссылки
  });
});
jQuery(document).ready(function ($) {
  $('.card-review a').on('click', function (e) {
    var $this = $(this);
    var $full = $this.prev('.cardReview__content_full');
    var $cut = $full.prev('.cardReview__content_cut');

    if ($full.hasClass('review__content_hidden')) {
      $full.removeClass('review__content_hidden');
      $cut.addClass('review__content_hidden');
      $this.text('Свернуть');
    } else {
      $full.addClass('review__content_hidden');
      $cut.removeClass('review__content_hidden');
      $this.text('Развернуть');
    }
  });
});
jQuery(document).ready(function ($) {
  $('.modal_spec').on('click', function () {
    var title = $(this).data('title');
    var content = $(this).data('content');
    var excerpt = $(this).data('excerpt');
    var image = $(this).data('image');
    console.log(title);
    console.log(content);
    console.log(excerpt);
    console.log(image);
    $('#modalImage').attr('src', image);
    $('#modalTitle').text(title);
    $('#modalExcerpt').text(excerpt);
    $('#modalContent').html(content);
  });
});