$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return (elementBottom-200 > viewportTop && elementTop < viewportBottom);
};


if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
$('.project-img').css("padding-left", "0");
$('.project-img').css("padding-right", "0");

$(window).on('resize scroll', function() {
  $('.project-img').each(function() {
    //  var activeColor = $(this).attr('id');
    if ($(this).isInViewport()) {
      $(this).fadeTo("slow", 0.5, $(this).attr('id', 'onview'));
    } else {
      $(this).removeAttr('id');
    }
  });
});
}
