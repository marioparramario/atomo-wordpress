$(document).ready(function(){
 $('body').addClass('ready');
});

$(document).ready(function(){
	$('.navbar-menu-button').click(function(){
			$('.navbar-menu-button').toggleClass('active');
			$('body').toggleClass('stop-scrolling');
      $('.navbar-mobile').toggleClass('active');
	});
});

$('.search-button').click(function(){
    $('.navbar-mobile').toggleClass('active');
});

$('.login').click(function(){
    $('.log-in').toggleClass('active');
    $('body').toggleClass('stop-scrolling');
});

$('.dropdown').click(function(){
    $('.sub-menu').toggleClass('active');
    console.log('come on');
});

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
    document.querySelector("#navbar").style.top = "0";
		document.querySelector(".navbar-menu").style.backgroundColor = "#1E1E1E";
		document.querySelector(".navbar-menu a").style.color = "white";
    // document.querySelector('.navbar-mobile').classList.remove('black');
  } else {
    document.querySelector("#navbar").style.top = "-180px";
		document.querySelector(".navbar-menu").style.backgroundColor = "white";
		document.querySelector(".navbar-menu a").style.color = "#1E1E1E";
    // document.querySelector('.navbar-mobile').classList.add('black');
  }
}

$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 180) {
        $(".navbar-mobile").addClass("black");
    } else {
        $(".navbar-mobile").removeClass("black");
    }
});
