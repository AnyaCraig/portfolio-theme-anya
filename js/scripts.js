  //                       ___
  //                    .-'   `'.
  //                   /         \
  //                   |         ;
  //                   |         |           ___.--,
  //          _.._     |0) ~ (0) |    _.---'`__.-( (_.
  //   __.--'`_.. '.__.\    '--. \_.-' ,.--'`     `""`
  //  ( ,.--'`   ',__ /./;   ;, '.__.'`    __
  //  _`) )  .---.__.' / |   |\   \__..--""  """--.,_
  // `---' .'.''-._.-'`_./  /\ '.  \ _.-~~~````~~~-._`-.__.'
  //       | |  .' _.-' |  |  \  \  '.               `~---`
  //        \ \/ .'     \  \   '. '-._)
  //         \/ /        \  \    `=.__`~-.
  //         / /\         `) )    / / `"".`\
  //   , _.-'.'\ \        / /    ( (     / /
  //    `--~`   ) )    .-'.'      '.'.  | (
  //           (/`    ( (`          ) )  '-;
  //            `      '-;         (-'


$(function(){
	console.log("I'm ready!");

	var menu = $(".top-menu");

	$(window).scroll(function() {
		if($(this).scrollTop() > (window.innerHeight - 80)) {
			menu.addClass("top-menu-scrolled");

		}
		else {
			menu.removeClass("top-menu-scrolled");
		}
	});

	$('.fa-bars').on('click', function(){
	  $('.drop-menu ul.menu').slideToggle(500);
	  $('.drop-menu ul.menu a').on('click', function() {
	  	$('.drop-menu ul.menu').fadeOut();

	  });


	});


});