/*MENU BURGER*/
$(function() {
    // var nav = $("#main-nav");
    var btn = $("#toggle-nav");

    btn.on("click", function(e){
        e.preventDefault();

        $("#main-nav").toggleClass("opened");
    });

});

$(function(){
    var a = $(".toggle-a");
    a.on("click", function(e){
        e.preventDefault();
        $("#main-nav").toggleClass("opened");
    });
});
/* FIN MENU BURGER */

/* BARRE COMPETENCE */
//$(function() {
//  $('progress').each(function() {
//    var max = $(this).val();
//    $(this).val(0).animate({ value: max }, { duration: 2000, easing: 'easeOutCirc' });
//			});
//});
/* FIN BARRE COMPETENCE */