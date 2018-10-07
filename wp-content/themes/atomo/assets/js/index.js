$('.open-menu').click(function(){
    $('.navbar-mobile').toggleClass('open');
    $('.menu-icon-mobile').toggleClass('open');
    $('main').toggleClass('blur-on');
});

$('main').click(function(){
    if($( 'main' ).hasClass( 'blur-on' )){
        $('.navbar-mobile').removeClass('open');
        $('.menu-icon-mobile').removeClass('open');
        $('main').removeClass('blur-on');
    }
});

// $('main').click(function(){
//    $('.navbar-mobile').removeClass('open');
//    $('.menu-icon-mobile').removeClass('open');
//    $('main').removeClass('blur-on');
// });

$("p").filter(function(){
    return $.trim(this.innerHTML) === "&nbsp;"
}).remove();


/*  === CAROUSEL ===  */

$('#home-carousel .pagination-indicator').click(function (e) {
  e.stopPropagation();

  const slideTo = $(this).data('slide-to');
  $('#home-carousel').carousel(slideTo);

  /* Remove .active from all indicators on all pages .. */
  $('#home-carousel .pagination-indicator').removeClass('active');

  /* .. before activating exactly one on the page that was selected */
  const nth = ':eq(' + slideTo + ')';
  const chosen = '#home-carousel .pagination' + nth + ' .pagination-indicator' + nth;

  $(chosen).addClass('active');
});
