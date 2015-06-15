(function($){

	$.fn.parallaxBannerSlider = function(){

		return this.each(function(){



			var $this = $(this),
				$slides = $this.find('.parallax-window'),
				$dotsList = $this.find('.dots .dotstyle ul'),
				$dots = $dotsList.find('a'),
				$mask = $this.find('.banner-area'),
				$slider,
				numSlides = $slides.length,
				lastIndex = numSlides-1,
				currentIndex = 0,
				delay = 4000,
				timeout;

			

			function createDots() {
				for (var i = 0; i < numSlides; i++){
					$dotsList.append('<li><a href="#"></a></li>');
				}

			}

			function changeSlide(){
				clearTimeout(timeout);
				timeout = setTimeout(nextSlide, delay);
				$slider.css({'margin-left': -currentIndex*100+"%"});
				//$thumbs.filter('.selected').removeClass('selected');
				//$thumbs.eq(currentIndex).addClass('selected');


			}

			function nextSlide() {
				currentIndex = (currentIndex < lastIndex)? currentIndex+1 : 0;
				changeSlide();
			}



			//Initialise
			//Wrap images inside a slider

			$slides.wrapAll('<div class="slider">');
			$slider = $this.find('.slider');

			//Set slider width
			$slider.width(100*numSlides+"%").css({transition: 'all 1s'});

			//Set images width
			$slides.width(100/numSlides+"%");

			//Set dots selected state
			$dots.eq(currentIndex).addClass('current');
			
			$mask.css({overflow: 'hidden'});
			timeout = setTimeout(nextSlide, delay);

			createDots();

			alert($dots.length);
			

			// $thumbs.click(function(){
			// 	currentIndex = $thumbs.index(this);
			// 	changeImage();
			// });

			// $prevBtn.click(function(){
			// 	currentIndex = (currentIndex > 0)? currentIndex-1 : lastIndex;
			// 	changeImage();
			// });

			// $nextBtn.click(nextImage);

		});

	}

})(jQuery)