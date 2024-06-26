/*модалки */
class bfmodal {
    constructor(props) {
      const defaultConfig = {
        backscroll: true,
        linkAttributeName: 'data-bfmodal',
        closeOnOverlay: true,
        closeOnEsc: true,
        closeOnButton: true,
        waitTransitions: false,
        catchFocus: true,
        fixedSelectors: '*[data-hystfixed]',
        beforeOpen: () => {},
        afterClose: () => {},
      };
      this.config = Object.assign(defaultConfig, props);
      if (this.config.linkAttributeName) {
        this.init();
      }
      this._closeAfterTransition = this._closeAfterTransition.bind(this);
    }
  
    init() {
      this.isOpened = false;
      this.openedWindow = false;
      this.starter = false;
      this._nextWindows = false;
      this._scrollPosition = 0;
      this._reopenTrigger = false;
      this._overlayChecker = false;
      this._isMoved = false;
      this._focusElements = [
        'a[href]',
        'area[href]',
        'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',
        'select:not([disabled]):not([aria-hidden])',
        'textarea:not([disabled]):not([aria-hidden])',
        'button:not([disabled]):not([aria-hidden])',
        'iframe',
        'object',
        'embed',
        '[contenteditable]',
        '[tabindex]:not([tabindex^="-"])',
      ];
      this._modalBlock = false;
  
      const existingShadow = document.querySelector('.bfmodal__shadow');
      if (existingShadow) {
        this.shadow = existingShadow;
      } else {
        this.shadow = document.createElement('div');
        this.shadow.classList.add('bfmodal__shadow');
        document.body.appendChild(this.shadow);
      }
      this.eventsFeeler();
    }
  
    eventsFeeler() {
      document.addEventListener('click', (e) => {
        const clickedlink = e.target.closest(`[${this.config.linkAttributeName}]`);
        if (!this._isMoved && clickedlink) {
          e.preventDefault();
          this.starter = clickedlink;
          const targetSelector = this.starter.getAttribute(this.config.linkAttributeName);
          this._nextWindows = document.querySelector(targetSelector);
          this.open();
          return;
        }
        if (this.config.closeOnButton && e.target.closest('[data-hystclose]')) {
          this.close();
        }
      });
  
      if (this.config.closeOnOverlay) {
        document.addEventListener('mousedown', (e) => {
          if (!this._isMoved && (e.target instanceof Element) && !e.target.classList.contains('bfmodal__wrap')) return;
          this._overlayChecker = true;
        });
  
        document.addEventListener('mouseup', (e) => {
          if (!this._isMoved && (e.target instanceof Element) && this._overlayChecker && e.target.classList.contains('bfmodal__wrap')) {
            e.preventDefault();
            this._overlayChecker = !this._overlayChecker;
            this.close();
            return;
          }
          this._overlayChecker = false;
        });
      }
  
      window.addEventListener('keydown', (e) => {
        if (!this._isMoved && this.config.closeOnEsc && e.which === 27 && this.isOpened) {
          e.preventDefault();
          this.close();
          return;
        }
        if (!this._isMoved && this.config.catchFocus && e.which === 9 && this.isOpened) {
          this.focusCatcher(e);
        }
      });
    }
  
    open(selector) {
      if (selector) {
        if (typeof (selector) === 'string') {
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
  
    close() {
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
  
    _closeAfterTransition() {
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
  
    focusControl() {
      const nodes = this.openedWindow.querySelectorAll(this._focusElements);
      if (this.isOpened && this.starter) {
        this.starter.focus();
      } else if (nodes.length) nodes[0].focus();
    }
  
    focusCatcher(e) {
      const nodes = this.openedWindow.querySelectorAll(this._focusElements);
      const nodesArray = Array.prototype.slice.call(nodes);
      if (!this.openedWindow.contains(document.activeElement)) {
        nodesArray[0].focus();
        e.preventDefault();
      } else {
        const focusedItemIndex = nodesArray.indexOf(document.activeElement);
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
  
    _bodyScrollControl() {
      if (!this.config.backscroll) return;
  
      // collect fixed selectors to array
      const fixedSelectorsElems = document.querySelectorAll(this.config.fixedSelectors);
      const fixedSelectors = Array.prototype.slice.call(fixedSelectorsElems);
  
      const html = document.documentElement;
      if (this.isOpened === true) {
        html.classList.remove('bfmodal__opened');
        html.style.marginRight = '';
        fixedSelectors.forEach((el) => {
          el.style.marginRight = '';
        });
        window.scrollTo(0, this._scrollPosition);
        html.style.top = '';
        return;
      }
      this._scrollPosition = window.pageYOffset;
      const marginSize = window.innerWidth - html.clientWidth;
      html.style.top = `${-this._scrollPosition}px`;
  
      if (marginSize) {
        html.style.marginRight = `${marginSize}px`;
        fixedSelectors.forEach((el) => {
          el.style.marginRight = `${parseInt(getComputedStyle(el).marginRight, 10) + marginSize}px`;
        });
      }
      html.classList.add('bfmodal__opened');
    }
  }
  const myModal = new bfmodal({
    catchFocus: true,
    closeOnEsc: true,
    backscroll: true,
    beforeOpen: function (modal) {
      console.log('Message before opening the modal');
      console.log(modal);
    },
    afterClose: function (modal) {
      console.log('Message after modal has closed');
      console.log(modal);
  
      let videoframe = modal.openedWindow.querySelector('iframe');
      if (videoframe) {
        videoframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
      }
    },
  });
  
  // липкая шапка
var header = jQuery('.header'),
	scrollPrev = 0;
  let menuElem = jQuery('.header'),
  menuFixed = 100, 
  menuStatus = false; 
  jQuery(window).on('scroll' ,function() {
	var scrolled = jQuery(window).scrollTop();
  if ( scrolled > 10) {
		header.addClass('fixed');
	}
  else if( scrolled > scrollPrev ) {
   	header.removeClass('fixed');
   
  }
  else {
     header.removeAttr('style').removeClass('fixed'); 
  }
	scrollPrev = scrolled;
});
jQuery("#hamburger").on('click', function(){
	jQuery(this).toggleClass("open");
	jQuery("#header-nav").toggleClass('open')
});
jQuery(document).ready(function($){
		$('.main-menu-item.active').append("<div class='wee'></div>");
		if ($('.main-menu-item.active').length) {
		var $thisnav = $('.main-menu-item.active').offset().left;
		$('.main-menu-item').hover(function () {
			var $left = $(this).offset().left - $thisnav;
			var $width = $(this).outerWidth();
			var $start = 0;
			$('.wee').css({'left': $left, 'width': $width});
			}, function () {
				var $initwidth = $('.main-menu-item.active').width();
				$('.wee').css({'left': '0', 'width': $initwidth});
			});
		}
		$('.header-links__item').on('click', function(){
			$(this).toggleClass('active')
		})
});
//подвигаем эллипсы
var items = document.querySelectorAll('.blobs img');
var layer = document.querySelector('.blobs');
items.forEach(item => requestAnimationFrame(() => move(item)));
function move(el) {
  var s = Math.random() > 0.5 ? 1 : -1;
	var x = s * (Math.random() * 20);
  var y = s * (Math.random() * 20);
  var td = Math.random() * 8 + 1;
  el.style.transitionDuration = `${td}s`;
  el.style.transform = `translate3d(${x}px, ${y}px, 0)`;
  setTimeout(function() {
    requestAnimationFrame(() => move(el));
  }, td * 1000);
}
/*карусель*/
var autoSwap = setInterval( swap,3500);
jQuery('.carousel, span').hover(
  function () {
    clearInterval(autoSwap);
}, 
  function () {
   autoSwap = setInterval( swap,3500);
});
var items = [];
var startItem = 1;
var position = 0;
var itemCount = jQuery('.carousel li.carusel__item').length;
var leftpos = itemCount;
var resetCount = itemCount;

jQuery('li.carusel__item').each(function(index) {
    items[index] = jQuery(this).text();
});
function swap(action) {
  var direction = action;
  if(direction == 'counter-clockwise') {
    var leftitem = $('.left-pos').attr('id') - 1;
    if(leftitem == 0) {
      leftitem = itemCount;
    }
    
    jQuery('.right-pos').removeClass('right-pos').addClass('back-pos');
    jQuery('.main-pos').removeClass('main-pos').addClass('right-pos');
    jQuery('.left-pos').removeClass('left-pos').addClass('main-pos');
    jQuery('#'+leftitem+'').removeClass('back-pos').addClass('left-pos');
    
    startItem--;
    if(startItem < 1) {
      startItem = itemCount;
    }
  }
  if(direction == 'clockwise' || direction == '' || direction == null ) {
    function pos(positionvalue) {
      if(positionvalue != 'leftposition') {
        position++;
        if((startItem+position) > resetCount) {
          position = 1-startItem;
        }
      }
      if(positionvalue == 'leftposition') {
        position = startItem - 1;
        if(position < 1) {
          position = itemCount;
        }
      }
    return position;
    }  
  
   jQuery('#'+ startItem +'').removeClass('main-pos').addClass('left-pos');
   jQuery('#'+ (startItem+pos()) +'').removeClass('right-pos').addClass('main-pos');
   jQuery('#'+ (startItem+pos()) +'').removeClass('back-pos').addClass('right-pos');
   jQuery('#'+ pos('leftposition') +'').removeClass('left-pos').addClass('back-pos');
  
    startItem++;
    position=0;
    if(startItem > itemCount) {
      startItem = 1;
    }
	jQuery('.paginate__item').removeClass('active');
	var id = jQuery(".main-pos").attr("id")
  } jQuery('[data-id ='+id +' ]').addClass('active');
}
jQuery('#next').click(function() {
  swap('clockwise');
});
jQuery('#prev').click(function() {
  swap('counter-clockwise');
});
jQuery('li.carusel__item').click(function() {
  if($(this).attr('class') == 'carusel__item left-pos') {
     swap('counter-clockwise'); 
  }
  else {
    swap('clockwise'); 
  }
});
if(document.getElementById("splide-doctors")) {
    var banner =  document.getElementById('splide-doctors') 
    var splide = new Splide( banner, {
      type   : 'loop',
      perPage: 4,
      perMove: 1,
      autoplay:false,
      pauseOnHover:true,
      pauseOnFocus: true,
      arrows:true,
	  pagination: false,
	   breakpoints: {
		380: {
			perPage: 1,
		},
		820: {
			perPage: 2,
		},
	   }
    }); 
  splide.on( 'mounted', function() {
        // if fewer slides than provided in options, set option to the number of slides
        if ( splide.length <= splide.options.perPage ) {
            splide.options.perPage = splide.length;
           
        }
    }); 
    splide.mount();
}
if(document.getElementById("splide-news")) {
    var banner =  document.getElementById('splide-news') 
    var splide = new Splide( banner, {
      type   : 'loop',
      perPage: 3,
      perMove: 1,
      autoplay:true,
      pauseOnHover:true,
      pauseOnFocus: true,
      arrows:false,
	  pagination: false,
	   breakpoints: {
		380: {
			perPage: 1,
		},
		820: {
			perPage: 2,
		},
	   }
    }); 
  splide.on( 'mounted', function() {
        // if fewer slides than provided in options, set option to the number of slides
        if ( splide.length <= splide.options.perPage ) {
            splide.options.perPage = splide.length;
           
        }
    }); 
    splide.mount();
	var btnNext =  document.getElementById('arrow-news--next')  
	var btnPrev =  document.getElementById('arrow-news--prev')   	
  btnNext.addEventListener('click', e => {
    splide.go('+1')
  })

  btnPrev.addEventListener('click', e => {
    splide.go('-1')
  })
}
if(document.getElementById("splide-reviews")) {
    var banner =  document.getElementById('splide-reviews') 
    var splide = new Splide( banner, {
      type   : 'loop',
      perPage: 3,
      perMove: 1,
      autoplay:true,
      pauseOnHover:true,
      pauseOnFocus: true,
      arrows:false,
	  pagination: false,
	  classes: {
		// Add classes for arrows.
		arrows: 'splide__arrows reviews-class-arrows',
		arrow : 'splide__arrow reviews-class-arrow',
		prev  : 'splide__arrow--prev reviews-class-prev',
		next  : 'splide__arrow--next reviews-class-next',
	  },
	   breakpoints: {
		380: {
			perPage: 1,
		},
		820: {
			perPage: 2,
		},
	   }
    }); 
  splide.on( 'mounted', function() {
        // if fewer slides than provided in options, set option to the number of slides
        if ( splide.length <= splide.options.perPage ) {
            splide.options.perPage = splide.length;
           
        }
    }); 
    splide.mount();
	  //attach events to custom buttons
	var btnNext =  document.getElementById('arrow-reviews--next')  
	var btnPrev =  document.getElementById('arrow-reviews--prev')   	
  btnNext.addEventListener('click', e => {
    splide.go('+1')
  })

  btnPrev.addEventListener('click', e => {
    splide.go('-1')
  })
}

jQuery(".card-review__content a").on("click", function(){
 jQuery(this).siblings('p').toggleClass('active');
 if (jQuery(this).text() == "Развернуть")
       jQuery(this).text("Свернуть")
    else
       jQuery(this).text("Развернуть");

 return false;
})
