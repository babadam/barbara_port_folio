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
