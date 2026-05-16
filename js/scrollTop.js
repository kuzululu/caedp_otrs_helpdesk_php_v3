$(document).ready(function(){
 let btn = $("#btnScrollToTop");
 // for selection window scrollTop
 $(window).scroll(function(){
  
  // for margin when greater than 40px
  if ($(this).scrollTop() > 10) {
   btn.fadeIn();
  }else{
   btn.fadeOut();
  }

 });

 btn.click(function(){
  $("html, body").animate({
  	scrollTop: 0,
  });
 });

});