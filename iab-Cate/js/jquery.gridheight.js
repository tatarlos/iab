(function($){

	$.fn.equaliseHeight = function(){

		return this.each(function(){
			var $this = $(this),
				$gridBoxes = $this.find('.grid-items-lines a'),
				maxHeight = 0;

			$gridBoxes.each(function(){
				maxHeight = maxHeight > $(this).height()? maxHeight:$(this).height();
			});

			$gridBoxes.height(maxHeight);


		});

	}

})(jQuery)