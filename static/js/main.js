var _width = $(window).width();
var page = $('body').attr('page');

$('#nav-main a[page="'+page+'"]').addClass('active');
$('header span.menu-icon').click(function(){
    $('nav#nav-main').toggle('slow');
});
$( window ).on('resize', function() {
    if ( _width != $(this).width() ) {
        $('nav#nav-main').toggle($('header span.menu-icon').is(':hidden'));
        _width = $(this).width();
    }
});

