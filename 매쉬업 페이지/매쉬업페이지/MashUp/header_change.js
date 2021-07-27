
$(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if(scroll >= 50) {
      $(".navbar-inverse").addClass("change");
    } else {
      $(".navbar-inverse").removeClass("change");
    }
  });