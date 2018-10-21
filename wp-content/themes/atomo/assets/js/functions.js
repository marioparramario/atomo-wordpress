$(document).ready(function(){
 $('body').addClass('ready');
});

$(document).ready(function(){
	$('.navbar-menu-button').click(function(){
			$('.navbar-menu-button').toggleClass('active');
			$('body').toggleClass('stop-scrolling');
      $('.navbar-mobile').toggleClass('active black');
	});
});

$('.search-button').click(function(){
    $('.navbar-mobile').toggleClass('active');
});

$('.login').click(function(){
    $('.log-in').toggleClass('active');
    $('body').toggleClass('stop-scrolling');
});






window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
    document.querySelector("#navbar").style.top = "0";
		document.querySelector("#lateral").style.opacity = "1";
		document.querySelector(".navbar-menu").style.backgroundColor = "#1E1E1E";
		document.querySelector(".navbar-menu a").style.color = "white";
    document.querySelector('.navbar-mobile').classList.remove('black');
  } else {
    document.querySelector("#navbar").style.top = "-180px";
		document.querySelector("#lateral").style.opacity = "0";
		document.querySelector(".navbar-menu").style.backgroundColor = "white";
		document.querySelector(".navbar-menu a").style.color = "#1E1E1E";
    document.querySelector('.navbar-mobile').classList.add('black');
  }
}

;(function(window) {

	'use strict';

	function StackFx(el) {
		this.DOM = {};
		this.DOM.el = el;
		this.DOM.stack = this.DOM.el.querySelector('.grid-item');
		this.DOM.img = this.DOM.stack.querySelector('.grid-item-image');
		// this.DOM.caption = this.DOM.el.querySelector('.grid__item-caption');
		this.DOM.caption = this.DOM.stack.querySelector('.grid-item-caption');
	}

	StackFx.prototype._removeAnimeTargets = function() {
		anime.remove(this.DOM.img);
		anime.remove(this.DOM.caption);
	};


// HamalFx
	function HamalFx(el) {
		StackFx.call(this, el);
		this._initEvents();
	}

	HamalFx.prototype = Object.create(StackFx.prototype);
	HamalFx.prototype.constructor = HamalFx;

	HamalFx.prototype._initEvents = function() {
		var self = this;
		this._mouseenterFn = function() {
			self._removeAnimeTargets();
			self._in();
		};
		this._mouseleaveFn = function() {
			self._removeAnimeTargets();
			self._out();
		};
		this.DOM.stack.addEventListener('mouseenter', this._mouseenterFn);
		this.DOM.stack.addEventListener('mouseleave', this._mouseleaveFn);
	};

	HamalFx.prototype._in = function() {
		var self = this;
		anime({
			targets: this.DOM.img,
			duration: 1000,
			easing: 'easeOutExpo',
			opacity: 0.3,
      scale: 0.98
		});

		anime({
			targets: [this.DOM.caption],
			duration: 1000,
			easing: 'easeOutExpo',
      opacity: 1,
			translateX: function(target, index) {
				return index === 0 ? 20 : -20;
			}
		});

	};

	HamalFx.prototype._out = function() {
		var self = this;
		anime({
			targets: this.DOM.img,
			duration: 1000,
			easing: 'easeOutElastic',
			opacity: 1,
      scale: 1
		});

		anime({
			targets: [this.DOM.caption],
			duration: 500,
			easing: 'easeOutExpo',
      opacity: 0,
			translateX: 0
		});
	};

	window.HamalFx = HamalFx;
})(window);
