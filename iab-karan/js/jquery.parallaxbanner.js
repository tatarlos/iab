(function($){

	$.fn.parallaxBannerSlider = function(){

		return this.each(function(){



			var $this = $(this),
				$slides = $this.find('.parallax-window'),
				$dotsList = $this.find('.dots .dotstyle ul'),
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
				$dots.filter('.current').removeClass('current');
				$dots.eq(currentIndex).addClass('current');
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

			//Create Dots
			createDots();

			//Set dots selected state
			var $dots = $dotsList.find('li a');
			$dots.eq(currentIndex).addClass('current');
			
			$mask.css({overflow: 'hidden'});
			timeout = setTimeout(nextSlide, delay);

			

			

			$dots.click(function(){
				currentIndex = $dots.index(this);
				changeSlide();
			});

			// $prevBtn.click(function(){
			// 	currentIndex = (currentIndex > 0)? currentIndex-1 : lastIndex;
			// 	changeImage();
			// });

			// $nextBtn.click(nextImage);

			function parallax(){
			  if( $(".parallax-window").length > 0 ) {
				    var plxBackground = $(".parallax-background");
				    var plxWindow = $(".parallax-window");

				    var plxWindowTopToPageTop = $(plxWindow).offset().top;
				    var windowTopToPageTop = $(window).scrollTop();
				    var plxWindowTopToWindowTop = plxWindowTopToPageTop - windowTopToPageTop;

				    var plxBackgroundTopToPageTop = $(plxBackground).offset().top;
				    var windowInnerHeight = window.innerHeight;
				    var plxBackgroundTopToWindowTop = plxBackgroundTopToPageTop - windowTopToPageTop;
				    var plxBackgroundTopToWindowBottom = windowInnerHeight - plxBackgroundTopToWindowTop;
				    var plxSpeed = 0.35;

				    plxBackground.css('top', - (plxWindowTopToWindowTop * plxSpeed) + 'px');
				  }

			}


			});

	}

})(jQuery)