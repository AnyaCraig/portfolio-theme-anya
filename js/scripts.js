$(function(){
	console.log("I'm ready!");

	var menu = $(".top-menu");

	$(window).scroll(function() {
		if($(this).scrollTop() > calc(100vh - 80)) {
			menu.addClass("top-menu-scrolled");

		}
		else {
			menu.removeClass("top-menu-scrolled");
		}
	});
});