$(document).ready(function() {
  


  // Refills Navigation Menu
  var menuToggle = $('#js-mobile-menu').unbind();
  $('#js-navigation-menu').removeClass("show");

  menuToggle.on('click', function(e) {
    e.preventDefault();
    $('#js-navigation-menu').slideToggle(function(){
      if($('#js-navigation-menu').is(':hidden')) {
        $('#js-navigation-menu').removeAttr('style');
      }
    });
  });




  // Refills Vertical Tabs
  $(".js-vertical-tab-content").hide();
  $(".js-vertical-tab-content:first").show();

  /* if in tab mode */

  $(".js-vertical-tab").click(function(event) {
    event.preventDefault();

    $(".js-vertical-tab-content").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).show();

    $(".js-vertical-tab").removeClass("is-active");
    $(this).addClass("is-active");

    $(".js-vertical-tab-accordion-heading").removeClass("is-active");
    $(".js-vertical-tab-accordion-heading[rel^='"+activeTab+"']").addClass("is-active");
  });

  /* if in accordion mode */

  $(".js-vertical-tab-accordion-heading").click(function(event) {
    event.preventDefault();

    $(".js-vertical-tab-content").hide();
    var accordion_activeTab = $(this).attr("rel");
    $("#"+accordion_activeTab).show();

    $(".js-vertical-tab-accordion-heading").removeClass("is-active");
    $(this).addClass("is-active");

    $(".js-vertical-tab").removeClass("is-active");
    $(".js-vertical-tab[rel^='"+accordion_activeTab+"']").addClass("is-active");
  });


  

  $('.banner').parallaxBannerSlider();
  $('.grid').equaliseHeight();
  // Refills Parallax BG
    if ($(".parallax-window").length) {
      parallax();
    }

});


$(window).scroll(function(e) {
  if ($(".parallax-window").length) {
    parallax();
  }
});

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
