$(document).ready(function() {

	$('.members').memberReveal();

	$(window).resize(function()
	{
		$('.members').memberReveal();
	});

});