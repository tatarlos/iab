(function($){

	$.fn.members = function(){

		return this.each(function(){



			var $this = $(this),
				$members = $this.find('.mem-slider-area .member-area'),
				$maskMem = $this.find('.mem-slider-area'),
				$memberSlider,
				numMemSlides = $members.length,
				lastMemIndex = (numMemSlides/4)-1,
				currentMemIndex = 0,
				delayMem = 4000,
				timeoutMem;

			

			

			function changeMember(){
				clearTimeout(timeoutMem);
				timeoutMem = setTimeout(nextMember, delayMem);
				// $memberSlider.css({'margin-left': -currentMemIndex*100+"%"});
				$memberSlider.css({'margin-left': -currentMemIndex*100+"%"});
				
			}

			function nextMember() {
				currentMemIndex = (currentMemIndex < lastMemIndex)? currentMemIndex+1 : 0;
				changeMember();
			}



			//Initialise

			//Wrap images inside a slider

			$members.wrapAll('<div class="member-slider">');
			$memberSlider = $this.find('.member-slider');

			//Set slider width
			$memberSlider.width(25*numMemSlides+"%").css({transition: 'all 1s'});

			//Set images width
			$members.width(100/numMemSlides+"%");

			//Set dots selected state
			// var $dots = $dotsList.find('li a');
			// $dots.eq(currentIndex).addClass('current');
			
			$maskMem.css({overflow: 'hidden'});
			timeoutMem = setTimeout(nextMember, delayMem);

			

			

			// $prevBtn.click(function(){
			// 	currentIndex = (currentIndex > 0)? currentIndex-1 : lastIndex;
			// 	changeImage();
			// });

			// $nextBtn.click(nextImage);

			
			});

	}

})(jQuery)