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
