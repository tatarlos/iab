(function($){

	$.fn.members = function(){

		return this.each(function(){



			var $this = $(this),
				$members = $this.find('.mem-slider-area .member-logo'),
				memberNumber = $members.length,
				delay,
				timer,
				displayNumber;

			
			function setNumber() {
				if($(window).width() > 800){
					displayNumber = 4;
				} else if ($(window).width() > 500 && $(window).width() < 800) {
					displayNumber = 2;
				} else {
					displayNumber = 1;
				}

				//console.log(displayNumber);
			}

			function fade() {
				$members.show();
				for(i = 0; i < numberOfLoops; i++){
					
					for(j=0; j < displayNumber; j++){
					$members.eq(i*displayNumber+j).delay(1000*(i+1)+(i*2*displayNumber+j) * 1000).fadeTo(1000, 1).delay(4000).fadeTo(1000, 0).delay(displayNumber*1000-((j+1)*1000)).hide(0);
				
					
					}
					
				}
			}
			

			//Initialise
			
			
			setNumber();	
			var numberOfLoops = memberNumber/displayNumber;
			delay = ((memberNumber/numberOfLoops)*6000)+(numberOfLoops*1500);
			fade();
			timer = setInterval(fade,delay);
		});

	}

})(jQuery)