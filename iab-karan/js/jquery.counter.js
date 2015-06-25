(function($){

	$.fn.counter = function(){

		return this.each(function(){



			var $this = $(this),
				$countTo = $this.find('h2 span').innerHTML,
				$element = $this.find('h2 span'),
				countFrom = 0;

			
			function startCount() {
				$('.statistics').waypoint(function(){
					
					od = new Odometer({
						el: $element,
						value: 0

					});

					od.update($countTo);
				});
			}

			

			//Initialise
			startCount();

			
			});

	}

})(jQuery)