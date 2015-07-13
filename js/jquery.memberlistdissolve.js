(function($){

	$.fn.members = function(){

		return this.each(function(){



			var $this = $(this),
				$members = $this.find('.mem-slider-area .member-logo'),
				memberNumber = $members.length,
				delay,
				timer,
				displayDelay,
				displayNumber;

			
			function setNumber() {
				if($(window).width() > 800){
					displayNumber = 4;
					displayDelay = 9;
					delay = (memberNumber*2+(memberNumber/displayNumber*2))*1000;
				} else if ($(window).width() > 500 && $(window).width() < 800) {
					displayNumber = 2;
					displayDelay = 7;
					delay = (memberNumber*4+1)*1000;
				} else {
					displayNumber = 1;
					displayDelay  = 6;
					delay = (memberNumber*7+1)*1000;
				}

				//console.log(displayNumber);
			}

			function fade() {
				$members.show(),
				subdelay = 0,
				loopstart = 0,
				fadeInTime = 1000,
				displayTime = 4000,
				fadeOutTime = 1000;

				for(i = 0; i < numberOfLoops; i++){				
					for(j=0; j < displayNumber; j++){

					$members.eq(i*displayNumber+j).delay((i*displayDelay+j+i)*1000).fadeTo(fadeInTime, 1).delay(displayTime).fadeTo(fadeOutTime, 0).delay(displayNumber*1000-((j+1)*1000)).hide(0);
					}
					
				}
			}
			

			//Initialise
			
			
			setNumber();	
			var numberOfLoops = memberNumber/displayNumber;
			fade();
			timer = setInterval(fade,delay);
		});

	}

})(jQuery)