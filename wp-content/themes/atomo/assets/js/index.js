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

  $('#home-carousel .pagination-indicator').removeClass('active');
});

$('#home-carousel').on('slid.bs.carousel', function (e) {
  e.stopPropagation();

  /* Slider page we changed to */
  const selector = '#home-carousel .pagination-indicator:eq(' + e.to + ')';
  $(selector).addClass('active');

  /* Stop automatic sliding after selection */
  $('#home-carousel').carousel('pause');
});
