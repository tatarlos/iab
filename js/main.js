$(document).ready(function() {

// adding sticky nav
var $nav = $('header');
new Waypoint.Sticky({element: $nav});

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

//filtering system for subfields page

  var $filter = $('.filtering-links'),
      currentIndex = 0,
      $container = $('.grid'),
      $subcontainer,
      $spinner = $('<i class = "fa fa-spinner fa-spin fa-3x">'),
      $selection = $('.grid'),
      sub,
      term,
      taxonomy,
      newIndex,
      postType,
      subterm,
      termID;


  $filter.click(function(event){
    event.preventDefault();
        term = $(this).data('term');
        taxonomy = $(this).data('taxonomy');
        newIndex = $filter.index(this);
        postType = $(this).data('post-type');
        termID = $(this).data('id');
    if(currentIndex === newIndex ){

    }else{
      filterlist();
    }
  });
  

  
  function filterlist(){
    sub = 0;
    currentIndex = newIndex;
    $container.fadeOut();
    $filter.removeClass('is-active');
    $filter.eq(currentIndex).addClass('is-active');
    
    var data = {
        'action': 'getFilteredPosts',
        'term':term,
        'tax': taxonomy,
        'post': postType,
        'id' : termID,
        'sub': sub
    };


    $.post(siteInfo.ajaxURL, data, function(data){
      $container.empty().append($spinner).fadeIn().html(data);
    });
    $('.grid').equaliseHeight();
  }

function filterSubCat(){
  $subcontainer = $('.grid-items-lines');
  $subcontainer.fadeOut();
   var data = {
        'action': 'getFilteredPosts',
        'term':subterm,
        'tax': taxonomy,
        'post': postType,
        'id' : termID,
        'sub': sub
    };


    $.post(siteInfo.ajaxURL, data, function(data){
      $subcontainer.empty().append($spinner).fadeIn().html(data);
    });
    $('.grid').equaliseHeight();


}

$selection.on('click', '.options',function(e){
  value = $("#selection option:selected").val();
  console.log(value);
  subterm = value;
  sub = 1;
  filterSubCat();
});//end click



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

  //intial load
  document.onreadystatechange = function () {
  
    if(document.readyState === "complete"){
    
    var $hasFilter = $(".filtering"),
        hflen = $hasFilter.length;
    if(hflen != 0){
     term = $hasFilter.data('term');
        taxonomy = $hasFilter.data('taxonomy');
        newIndex = $hasFilter.data('index');
        postType = $hasFilter.data('post-type');
        termID = $hasFilter.data('id');

        console.log(term);
        console.log(taxonomy);
        console.log(newIndex);
        console.log(postType);
        console.log(termID);

        filterlist(term,taxonomy,newIndex,postType,termID);
    }
      $('.grid').equaliseHeight();
    }
  }
 

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


