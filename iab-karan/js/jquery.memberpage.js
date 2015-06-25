(function($){
	$.fn.memberReveal = function(){
		return this.each(function(){

		var $this = $(this),
			$thumbs = $this.find('.member-logos img'),
			$description = $this.find('.member-info .member-description'),
			$info = $this.find('.member-info'),
			$nextBtn = $this.find('.right-arrow'),
			$prevBtn = $this.find('.left-arrow'),
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
			$description.eq(currentIndex).velocity('fadeOut', {duration: 600});
			$thumbs.eq(currentIndex).removeClass('selected');
			currentIndex = newIndex;
			$description.eq(currentIndex).velocity('fadeIn', {duration: 200});
			$thumbs.eq(currentIndex).addClass('selected');
		}

		function nextImage(){
			var newIndex = (currentIndex < lastIndex)? currentIndex+1 : 0;
			changeImage(newIndex);
		}

		

		//Initialisation
		$description.hide().eq(currentIndex).show();
		$thumbs.wrapAll('<div class="logo-thumbnails">');
		$logoSlider = $('.logo-thumbnails');
		$logoSlider.width((100/displayNumber)*numImages+"%").css({transition: 'all 1s'});
		$thumbs.width((100/numImages)/displayNumber+"%");
		$mask.height($thumbs.width()).css({overflow:'hidden'});
		$info.height($description.height());
		$thumbs.eq(currentIndex).addClass('selected');

		$thumbs.click(function(){
			var newIndex = $thumbs.index(this);
			changeImage(newIndex);
		});

		$nextBtn.click(nextImage);

		$prevBtn.click(function(){
			var newIndex =(currentIndex > 0)? currentIndex-1 : lastIndex;
			changeImage(newIndex);
		});

		})
	
	}
})(jQuery)
