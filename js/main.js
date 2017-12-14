/*MENU BURGER*/

// fonction au clique sur l'icone burger
$(function() {
    // var nav = $("#main-nav");
    var btn = $("#toggle-nav");

    btn.on("click", function(e){
        e.preventDefault();

        $("#main-nav").toggleClass("opened");
    });

});

//fonction au clique sur les liens de menu burger 
$(function(){
    var a = $(".toggle-a");
    a.on("click", function(e){
        e.preventDefault();
        $("#main-nav").toggleClass("opened");
    });
});
/* FIN MENU BURGER */

/* BARRE COMPETENCE */
$(document).ready(function(){
	$('.skillbar').each(function(){
		$(this).find('.skillbar-bar').animate({
			width:$(this).attr('data-percent')
		},3000);
	});
});
/* FIN BARRE COMPETENCE */
