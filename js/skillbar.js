/*jQuery(document).ready(function(){
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});*/

function isElementVisible($elementToBeChecked)
{
    var TopView = $(window).scrollTop();
    var BotView = TopView + $(window).height();
    var TopElement = $elementToBeChecked.offset().top;
    var BotElement = TopElement + $elementToBeChecked.height();
    return ((BotElement <= BotView) && (TopElement >= TopView));
}

$(window).scroll(function () {
    $( ".skillbar" ).each(function() {
        $this = $(this);
        isOnView = isElementVisible($(this));
        if(isOnView && !$(this).hasClass('Starting')){
            $(this).addClass('Starting');
            startAnimation($(this));
        }
    });
});

function startAnimation($this) {
  $this.find('.skillbar-bar').animate({
    width: $this.attr('data-percent')
  }, 3000, function() {
    // Animation complete.
  });
}