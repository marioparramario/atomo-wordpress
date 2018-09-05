//Check Mobile Devices
var checkMobile = function(){
    //Check Device
    var isTouch = ('ontouchstart' in document.documentElement);
    //Check Device //All Touch Devices
    if ( isTouch ) {
        $('html').addClass('touch');
    }
    else {
        $('html').addClass('no-touch');
    };
};
//Execute Check
checkMobile();

$('.open-menu').click(function(){
    $('.navbar-mobile').toggleClass('open');
    $('.menu-icon-mobile').toggleClass('open');
    $('.container').toggleClass('blur-on');
});


$('.container').click(function(){
    if($( '.container' ).hasClass( 'blur-on' )){
        $('.navbar-mobile').removeClass('open');
        $('.menu-icon-mobile').removeClass('open');
        $('.container').removeClass('blur-on');
    }
});


// $('.container').click(function(){
//    $('.navbar-mobile').removeClass('open');
//    $('.menu-icon-mobile').removeClass('open');
//    $('.container').removeClass('blur-on');
// });


$("p").filter(function(){
    return $.trim(this.innerHTML) === "&nbsp;"
}).remove();
