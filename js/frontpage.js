$(document).ready(function() {
//add to cart button functionality
  var $addCart = $('.addCart');


  $addCart.click(function(){
    id = $(this).data('id');
    cost = $(this).data('cost');
    date = $(this).data('date');
    
    dataSend = {
        'action': 'addToCart',
        'id': id,
        'cost': cost,
        'date': date
    }
  $.post(siteInfo.ajaxURL, dataSend, function(data){
    });
  });


  
 var $filter = $('.filtering-links'),
      $currentTab="all",
      $container = $('.grid-items-lines');

//filtering system for subfields page

  $filter.click(function(event){
    event.preventDefault();
    var 
      $term = $(this).data('term'),
      $taxonomy = $(this).data('taxonomy'),
      $postType = $(this).data('post-type')
      

    if($currentTab === $taxonomy){

    }else{
      $currentTab = $taxonomy;
      $container.fadeOut();
      $filter.removeClass('is-active');
      $(this).addClass('is-active');
      
      
      var data = {
          'action': 'getFilteredPosts',
          'term':$term,
          'tax': $taxonomy,
          'post': $postType
      };
      $.post(siteInfo.ajaxURL, data, function(data){
       $container.empty().fadeIn().html(data);
       $('.grid').equaliseHeight();
      });
    }

  });

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
  $('.starting-tab1').addClass("is-active");
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


});


