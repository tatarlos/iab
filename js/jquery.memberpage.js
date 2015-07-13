(function($){
	$.fn.memberReveal = function(){
		return this.each(function(){

		var $this = $(this),
			$thumbs = $this.find('.upper-area .member-logos img'),
			$description = $this.find('.member-info .member-description'),
			$info = $this.find('.member-info'),
			$nextBtn = $this.find('.upper-area .arrows .fa-angle-right'),
			$prevBtn = $this.find('.upper-area .arrows .fa-angle-left'),
			$mask = $this.find('.member-logos'),
			$logoSlider,
			lastIndex = $description.length-1,
			numImages = $thumbs.length,
			currentIndex = 0,
			delay = 4000,
			displayNumber,
			timer;

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

		function changeImage(newIndex){
			//resetTimer();
			$description.eq(currentIndex).fadeOut(600);
			$thumbs.eq(currentIndex).removeClass('selected');
			currentIndex = newIndex;
			$description.eq(currentIndex).fadeIn(600);
			$thumbs.eq(currentIndex).addClass('selected');
		}

		function nextImage(){
			var newIndex = (currentIndex < lastIndex)? currentIndex+1 : 0;
			changeImage(newIndex);
			console.log(currentIndex % displayNumber);
			if (currentIndex % displayNumber === 0 && currentIndex != lastIndex) {
				$logoSlider.css({'margin-left': -100+"%"});
			}

			if (currentIndex === 0){
				$logoSlider.css({'margin-left': 0});
			}
		}

		function setDimentions() {
			$logoSlider.width((100/displayNumber)*numImages+"%").css({transition: 'all 1s'});
			$thumbs.width(100/numImages+"%");
			$mask.height(100/numImages+"%").css({overflow:'hidden'});
			$info.height($description.height());
		}


		

		//Initialisation
		setNumber();
		$description.hide().eq(currentIndex).show();
		$thumbs.wrapAll('<div class="logo-thumbnails">');
		$logoSlider = $('.logo-thumbnails');
		$thumbs.eq(currentIndex).addClass('selected');
		setDimentions();
		$thumbs.click(function(){
			var newIndex = $thumbs.index(this);
			changeImage(newIndex);
		});

		$nextBtn.click(nextImage);

		$prevBtn.click(function(){
			var newIndex =(currentIndex > 0)? currentIndex-1 : lastIndex;
			changeImage(newIndex);

		});
		

		$(window).resize(function(){
			setNumber();
			setDimentions();
		});


		})
	
	}
})(jQuery)
