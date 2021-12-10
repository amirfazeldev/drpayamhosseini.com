$(document).ready(function(){
$(".bar").click(function (e) {
        $(".nav").slideToggle(0.0000003);
        e.preventDefault();
    });
});

$(window).resize(function(){
       if ($('.header').width() > 1268) {
        
    $(".nav").slideUp(0.0000003);
    $(".nav ").css("display","inline-block");
    
    }
    });